<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ministerio\BulkDestroyMinisterio;
use App\Http\Requests\Admin\Ministerio\DestroyMinisterio;
use App\Http\Requests\Admin\Ministerio\IndexMinisterio;
use App\Http\Requests\Admin\Ministerio\StoreMinisterio;
use App\Http\Requests\Admin\Ministerio\UpdateMinisterio;
use App\Models\Ministerio;
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

class MinisteriosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMinisterio $request
     * @return array|Factory|View
     */
    public function index(IndexMinisterio $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ministerio::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.ministerio.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ministerio.create');

        return view('admin.ministerio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMinisterio $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMinisterio $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Ministerio
        $ministerio = Ministerio::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ministerios'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ministerios');
    }

    /**
     * Display the specified resource.
     *
     * @param Ministerio $ministerio
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ministerio $ministerio)
    {
        $this->authorize('admin.ministerio.show', $ministerio);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ministerio $ministerio
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ministerio $ministerio)
    {
        $this->authorize('admin.ministerio.edit', $ministerio);


        return view('admin.ministerio.edit', [
            'ministerio' => $ministerio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMinisterio $request
     * @param Ministerio $ministerio
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMinisterio $request, Ministerio $ministerio)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Ministerio
        $ministerio->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ministerios'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ministerios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMinisterio $request
     * @param Ministerio $ministerio
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMinisterio $request, Ministerio $ministerio)
    {
        $ministerio->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMinisterio $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMinisterio $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ministerio::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
