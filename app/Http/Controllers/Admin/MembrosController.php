<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Membro\BulkDestroyMembro;
use App\Http\Requests\Admin\Membro\DestroyMembro;
use App\Http\Requests\Admin\Membro\IndexMembro;
use App\Http\Requests\Admin\Membro\StoreMembro;
use App\Http\Requests\Admin\Membro\UpdateMembro;
use App\Models\Curso;
use App\Models\Membro;
use App\Models\Ministerio;
use App\Models\Status;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MembrosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMembro $request
     * @return array|Factory|View
     */
    public function index(IndexMembro $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Membro::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'birth_date', 'phone', 'address', 'marital_status', 'personality', 'isBaptized', 'isLeader', 'isPastor', 'status_id', 'spouse_name', 'wedding_date', 'baptized_date', 'discipler'],

            // set columns to searchIn
            ['id', 'name', 'phone', 'address', 'marital_status', 'personality', 'description', 'spouse_name', 'discipler', 'status.name', 'ministerios.name', 'cursos.name'],

            function ($query) use ($request) {
                $query->with(['status', 'ministerios', 'cursos']);

                // add this line if you want to search by author attributes
                $query->join('status', 'status.id', '=', 'membros.status_id');

                if ($request->has('status')) {
                    $query->whereIn('status_id', $request->get('status'));
                }

                $query->leftJoin('membro_ministerio', 'membro_ministerio.membro_id', '=', 'membros.id')
                    ->leftJoin('ministerios', 'ministerios.id', '=', 'membro_ministerio.ministerio_id')
                    ->groupBy('membros.id');


                $query->leftJoin('curso_membro', 'curso_membro.membro_id', '=', 'membros.id')
                    ->leftJoin('cursos', 'cursos.id', '=', 'curso_membro.curso_id')
                    ->groupBy('membros.id');
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.membro.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.membro.create');

        return view('admin.membro.create', [
            'status' => Status::All(),
            'ministerios' => Ministerio::All(),
            'cursos' => Curso::All(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMembro $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMembro $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['status_id'] = $request->getStatusId();
        $sanitized['ministerios'] = $request->getMinisterios();
        $sanitized['cursos'] = $request->getCursos();

        DB::transaction(function () use ($sanitized) {
            // Store the ArticlesWithRelationship
            $membros = Membro::create($sanitized);
            $membros->ministerios()->sync($sanitized['ministerios']);
            $membros->cursos()->sync($sanitized['cursos']);
        });
        // Store the Membro
        // $membro = Membro::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/membros'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/membros');
    }

    /**
     * Display the specified resource.
     *
     * @param Membro $membro
     * @throws AuthorizationException
     * @return void
     */
    public function show(Membro $membro)
    {
        $this->authorize('admin.membro.show', $membro);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Membro $membro
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Membro $membro)
    {
        $this->authorize('admin.membro.edit', $membro);

        $membro->load('status');
        $membro->load('ministerios');
        $membro->load('cursos');

        return view('admin.membro.edit', [
            'membro' => $membro,
            'status' => Status::All(),
            'ministerios' => Ministerio::All(),
            'cursos' => Curso::All(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMembro $request
     * @param Membro $membro
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMembro $request, Membro $membro)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['status_id'] = $request->getStatusId();
        $sanitized['ministerios'] = $request->getMinisterios();
        $sanitized['cursos'] = $request->getCursos();

        DB::transaction(function () use ($membro, $sanitized) {
            // Update changed values ArticlesWithRelationship
            $membro->update($sanitized);
            $membro->ministerios()->sync($sanitized['ministerios']);
            $membro->cursos()->sync($sanitized['cursos']);
        });

        // Update changed values Membro
        // $membro->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/membros'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/membros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMembro $request
     * @param Membro $membro
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMembro $request, Membro $membro)
    {
        $membro->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMembro $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMembro $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Membro::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
