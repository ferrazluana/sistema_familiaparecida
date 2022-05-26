<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Curso\BulkDestroyCurso;
use App\Http\Requests\Admin\Curso\DestroyCurso;
use App\Http\Requests\Admin\Curso\IndexCurso;
use App\Http\Requests\Admin\Curso\StoreCurso;
use App\Http\Requests\Admin\Curso\UpdateCurso;
use App\Models\Curso;
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

class CursosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCurso $request
     * @return array|Factory|View
     */
    public function index(IndexCurso $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Curso::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.curso.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.curso.create');

        return view('admin.curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCurso $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCurso $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Curso
        $curso = Curso::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cursos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param Curso $curso
     * @throws AuthorizationException
     * @return void
     */
    public function show(Curso $curso)
    {
        $this->authorize('admin.curso.show', $curso);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Curso $curso
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Curso $curso)
    {
        $this->authorize('admin.curso.edit', $curso);


        return view('admin.curso.edit', [
            'curso' => $curso,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCurso $request
     * @param Curso $curso
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCurso $request, Curso $curso)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Curso
        $curso->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cursos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCurso $request
     * @param Curso $curso
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCurso $request, Curso $curso)
    {
        $curso->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCurso $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCurso $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Curso::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
