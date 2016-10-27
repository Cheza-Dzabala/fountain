<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title tabbable-line">
                <div class="caption">
                    <i class="icon-bubbles font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">YOUR LOAN APPLICATIONS</span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#portlet_comments_1" data-toggle="tab"> Unapproved </a>
                    </li>
                    <li>
                        <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="portlet_comments_1">
                        <!-- BEGIN: Comments -->
                        <div class="mt-comments">
                        @foreach($applications as $application)
                            @if($application->applicationStatus != 'Approved')
                              <div class="mt-comment">
                                    <div class="mt-comment-img">
                                        <img src="{{ $application->clientImage }}" width="50px" height="50px" />
                                    </div>
                                    <div class="mt-comment-body">
                                        <div class="mt-comment-info">
                                            <span class="mt-comment-author">{{ $application->clientFirstName }} {{ $application->clientLastName }}| MWK {{ number_format($application->loanAmount, 2) }}</span>
                                            <span class="mt-comment-date">{{ $application->created_at }}</span>
                                        </div>
                                        <div class="mt-comment-text">{{ $application->recommendationNotes }}</div>
                                        <div class="mt-comment-details">
                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                            <ul class="mt-comment-actions">
                                                <li>
                                                    <a href="{{ route('loan.view', $application->id) }}">View</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                              </div>
                            @endif
                        @endforeach
                        </div>
                        <!-- END: Comments -->
                    </div>
                    <div class="tab-pane" id="portlet_comments_2">
                        <!-- BEGIN: Comments -->
                        <div class="mt-comments">

                            @foreach($applications as $application)
                                @if($application->applicationStatus == 'Approved')

                                    <div class="mt-comment">
                                        <div class="mt-comment-img">
                                            <img src="{{ $application->clientImage }}" width="50px" height="50px" />
                                        </div>
                                        <div class="mt-comment-body">
                                            <div class="mt-comment-info">
                                                <span class="mt-comment-author">{{ $application->clientFirstName }} {{ $application->clientLastName }}| MWK {{ number_format($application->loanAmount, 2) }}</span>
                                                <span class="mt-comment-date">{{ $application->created_at }}</span>
                                            </div>
                                            <div class="mt-comment-text">{{ $application->recommendationNotes }}</div>
                                            <div class="mt-comment-details">
                                                <span class="mt-comment-status mt-comment-status-pending">{{ $application->applicationStatus }}</span>
                                                <ul class="mt-comment-actions">
                                                    <li>
                                                        <a href="{{ route('loan.view', $application->id) }}">View</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <!-- END: Comments -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>