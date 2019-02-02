<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\SidebarAdmin\SidebarAdminRepositoryInterface;

class SidebarAdminServiceController extends Controller
{
    protected $SidebarAdminRepositoryInterface;

    public function __construct(SidebarAdminRepositoryInterface $SidebarAdminRepositoryInterface)
    {
        $this->SidebarAdminRepositoryInterface = $SidebarAdminRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getList()
    {
        $sidebarItems = $this->SidebarAdminRepositoryInterface->getAll();
        return view('admin::sidebar.list',compact('sidebarItems'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::sidebar.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->SidebarAdminRepositoryInterface->save($request->all());
        return redirect()->route('get.sidebar_item.list')->with('success','Tạo mới sidebar item thành công');
    }

   
    public function edit($id)
    {
        $sidebarItem = $this->SidebarAdminRepositoryInterface->find($id);
        return view('admin::sidebar.create_edit',compact('sidebarItem'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $sidebarItem = $this->SidebarAdminRepositoryInterface->update($request->all(),$id);
        return redirect()->route('get.sidebar_item.list')->with('success','Cập nhật sidebar item thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function delete($id)
    {
        $this->SidebarAdminRepositoryInterface->delete($id);
        return redirect()->back()->with('success','Xóa sidebar item thành công');
    }
}
