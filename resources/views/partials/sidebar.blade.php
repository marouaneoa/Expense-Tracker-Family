<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text ">{{ __('Expense Tracker') }}</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider">

            @can('user_management_access')
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('User Management') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Subusers') }}</a>
                    </div>
                </div>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseExpense" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Expense Management') }}</span>
                </a>
                <div id="collapseExpense" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/expense_categories') || request()->is('admin/expense_categories/*') ? 'active' : '' }}" href="{{ route('admin.expense_categories.index') }}">
                            <i class="fa fa-list-alt mr-2"></i> {{ __('Expense category') }}
                        </a>
                        <a class="collapse-item {{ request()->is('admin/income_categories') || request()->is('admin/income_categories/*') ? 'active' : '' }}" href="{{ route('admin.income_categories.index') }}">
                            <i class="fa fa fa-list mr-2"></i> {{ __('Income category') }}
                        </a>
                        <a class="collapse-item {{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}" href="{{ route('admin.expenses.index') }}">
                            <i class="fa fa-money-bill-wave mr-2"></i> {{ __('Expense') }}
                        </a>
                        <a class="collapse-item {{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}" href="{{ route('admin.incomes.index') }}">
                            <i class="fa fa-hand-holding-usd mr-2"></i> {{ __('Income') }}
                        </a>
                        <a class="collapse-item {{ request()->is('admin/transfers') ? 'active' : '' }}" href="{{ route('admin.transfers.index') }}">
                            <i class="fa fa-exchange-alt mr-2"></i> {{ __('Transfers') }}
                        </a>
                    </div>
                </div>
            </li>
            


        </ul>