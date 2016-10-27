<li class="menu-dropdown classic-menu-dropdown">
    <a href="javascript:;"> Loan & Services
        <span class="arrow"></span>
    </a>
    <ul class="dropdown-menu" style="min-width: 250px">
        <li class="dropdown-submenu">
            <a href="javascript:;" class="nav-link">
                <i class="fa fa-files-o" aria-hidden="true"></i>Loan Applications
                &nbsp;
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a href="#" class="nav-link">
                        Create New Application
                    </a>
                    <ul class="dropdown-menu">
                       @foreach($loanTypes as $type)
                            <li>
                                <a href="{{ route('loans.new', $type->id) }}" class="nav-link">
                                    {{ $type->name }}
                                </a>
                            </li>
                       @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('loans.index') }}" class="nav-link">
                        View All Applications
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Compile Application Report
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="nav-link">
                <i class="fa fa-line-chart"></i>
                Active Loans</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#" class="nav-link">
                        View Loan Records
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Manage Active Loans
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                       Defaulted Loans
                    </a>
                </li>

            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="nav-link">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                Loan Schemes
                &nbsp;
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($loanTypes as $type)
                    <li class="dropdown-submenu">
                        <a href="#" class="nav-link">
                            {{ $type->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('settings.loanType.edit', $type->name) }}" class="nav-link">
                                    Set Scheme Attributes
                                </a>
                            </li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="nav-link">
                <i class="fa fa-gear"></i>
                Loan Parameters
                &nbsp;
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#" class="nav-link">
                        Interest Calculation</a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Payable Ammounts
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        Fees
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</li>