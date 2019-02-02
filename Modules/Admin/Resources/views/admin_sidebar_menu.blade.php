<ul class="sidebar-menu" data-widget="tree">
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i> <span>Ứng viên</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="http://codetest.abc/admin/candidate"><i class="fa fa-circle-o"></i> Danh sách ứng viên</a></li>
        </ul>
    </li>
    @inject('sidebar','Modules\Admin\Models\SidebarAdminService')
    <?php $sidebarItems = $sidebar->getAllSidebarAdmin(); ?>
    @foreach($sidebarItems as $sidebarItem)
        @if(admin_can($sidebarItem->permission))
        <li class="treeview">
            <a href="#">
                <i class="{{$sidebarItem->icon}}"></i> <span>{{$sidebarItem->name}}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @foreach(json_decode($sidebarItem->item) as $item_name => $item_link)
                <li><a href="{{route($item_link)}}"><i class="fa fa-circle-o"></i> {{$item_name}}</a></li>
                @endforeach
            </ul>
        </li>
        @endif
    @endforeach
</ul>