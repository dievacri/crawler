<div class="col-md-12">
    <nav data-ng-controller="HomeController" data-ng-include="'/application/views/navbar.php'" class="navbar navbar-default">      
    </nav>
    <div class="row">
        <div class="col-md-2">
            <div data-ng-controller="SidebarController" data-ng-include="'/application/views/sidebar.php'">
            </div>
        </div>
        <div class="col-md-10 container-fluid">
            <div class="side-body">
                <div ui-view></div>
            </div>
        </div>
    </div>
</div>