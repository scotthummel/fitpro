@if (auth()->check())

    @can('administer-site')

        <nav class="navbar navbar-default navbar-admin">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @can('administer-users')
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/roles">Roles</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('administer-fitness')
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fitness <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/admin/exercise-categories">Exercise Categories</a></li>
                                    <li><a href="/admin/exercise-categories/create">Create Exercise Category</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/admin/exercises">Exercises</a></li>
                                    <li><a href="/admin/exercises/create">Create Exercise</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/admin/body-parts">Body Parts</a></li>
                                    <li><a href="/admin/body-parts/create">Create Body Part</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/admin/muscles">Muscles</a></li>
                                    <li><a href="/admin/muscles/create">Create Muscle</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('administer-clients')
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trainer <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/admin/assign-exercises">Assigned Exercises</a></li>
                                        <li><a href="/admin/assign-exercises/create">Assign Exercise</a></li>

                                    </ul>
                                </li>
                        @endcan
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    @endcan

@endif
