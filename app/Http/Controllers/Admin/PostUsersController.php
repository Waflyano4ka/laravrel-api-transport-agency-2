<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostUser\BulkDestroyPostUser;
use App\Http\Requests\Admin\PostUser\DestroyPostUser;
use App\Http\Requests\Admin\PostUser\IndexPostUser;
use App\Http\Requests\Admin\PostUser\StorePostUser;
use App\Http\Requests\Admin\PostUser\UpdatePostUser;
use App\Models\PostUser;
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

class PostUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPostUser $request
     * @return array|Factory|View
     */
    public function index(IndexPostUser $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PostUser::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['deleted', 'id', 'post_id', 'user_id'],

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

        return view('admin.post-user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.post-user.create');

        return view('admin.post-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostUser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePostUser $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PostUser
        $postUser = PostUser::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/post-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/post-users');
    }

    /**
     * Display the specified resource.
     *
     * @param PostUser $postUser
     * @throws AuthorizationException
     * @return void
     */
    public function show(PostUser $postUser)
    {
        $this->authorize('admin.post-user.show', $postUser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostUser $postUser
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PostUser $postUser)
    {
        $this->authorize('admin.post-user.edit', $postUser);


        return view('admin.post-user.edit', [
            'postUser' => $postUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostUser $request
     * @param PostUser $postUser
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePostUser $request, PostUser $postUser)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PostUser
        $postUser->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/post-users'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/post-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPostUser $request
     * @param PostUser $postUser
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPostUser $request, PostUser $postUser)
    {
        $postUser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPostUser $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPostUser $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PostUser::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
