<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Route\BulkDestroyRoute;
use App\Http\Requests\Admin\Route\DestroyRoute;
use App\Http\Requests\Admin\Route\IndexRoute;
use App\Http\Requests\Admin\Route\StoreRoute;
use App\Http\Requests\Admin\Route\UpdateRoute;
use App\Models\Route;
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

class RoutesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoute $request
     * @return array|Factory|View
     */
    public function index(IndexRoute $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Route::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['arrival_city_id', 'deleted', 'departure_city_id', 'distance', 'id', 'user_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.route.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.route.create');

        return view('admin.route.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoute $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRoute $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Route
        $route = Route::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/routes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/routes');
    }

    /**
     * Display the specified resource.
     *
     * @param Route $route
     * @throws AuthorizationException
     * @return void
     */
    public function show(Route $route)
    {
        $this->authorize('admin.route.show', $route);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Route $route
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Route $route)
    {
        $this->authorize('admin.route.edit', $route);


        return view('admin.route.edit', [
            'route' => $route,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoute $request
     * @param Route $route
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRoute $request, Route $route)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Route
        $route->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/routes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/routes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoute $request
     * @param Route $route
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRoute $request, Route $route)
    {
        $route->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRoute $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRoute $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Route::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
