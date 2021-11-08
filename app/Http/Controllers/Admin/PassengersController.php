<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Passenger\BulkDestroyPassenger;
use App\Http\Requests\Admin\Passenger\DestroyPassenger;
use App\Http\Requests\Admin\Passenger\IndexPassenger;
use App\Http\Requests\Admin\Passenger\StorePassenger;
use App\Http\Requests\Admin\Passenger\UpdatePassenger;
use App\Models\Passenger;
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

class PassengersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPassenger $request
     * @return array|Factory|View
     */
    public function index(IndexPassenger $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Passenger::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['deleted', 'first_name', 'id', 'passport_number', 'passport_series', 'phone', 'second_name', 'surname'],

            // set columns to searchIn
            ['first_name', 'id', 'passport_number', 'passport_series', 'phone', 'second_name', 'surname']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.passenger.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.passenger.create');

        return view('admin.passenger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePassenger $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePassenger $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Passenger
        $passenger = Passenger::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/passengers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/passengers');
    }

    /**
     * Display the specified resource.
     *
     * @param Passenger $passenger
     * @throws AuthorizationException
     * @return void
     */
    public function show(Passenger $passenger)
    {
        $this->authorize('admin.passenger.show', $passenger);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Passenger $passenger
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Passenger $passenger)
    {
        $this->authorize('admin.passenger.edit', $passenger);


        return view('admin.passenger.edit', [
            'passenger' => $passenger,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePassenger $request
     * @param Passenger $passenger
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePassenger $request, Passenger $passenger)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Passenger
        $passenger->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/passengers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/passengers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPassenger $request
     * @param Passenger $passenger
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPassenger $request, Passenger $passenger)
    {
        $passenger->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPassenger $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPassenger $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Passenger::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
