<!-- Author : Nguyen Quang Truong (truongnq017@gmail.com) -->
@foreach(\SideBarDashBoard::getAll() as $dashboard_sidebar)
    @if($dashboard_sidebar->type == 'item')
        <div @if(!is_null($dashboard_sidebar->getStyleCss()))
                 style="{{$dashboard_sidebar->getStyleCss() ?? ''}}"
            @endif>
            <li class="nav-item">
                <a class="nav-link {{$dashboard_sidebar->getClass() ?? ''}}"
                   href="{{$dashboard_sidebar->getRoute()}}"><i
                        class="{{$dashboard_sidebar->getIcon() ?? ''}}"></i> {{$dashboard_sidebar->getLabel() ?? ''}}
                </a>
            </li>
        </div>
    @elseif($dashboard_sidebar->type == 'group')
        <div @if(!is_null($dashboard_sidebar->getStyleCss()))
                 style="{{$dashboard_sidebar->getStyleCss() ?? ''}}"
            @endif>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle {{$dashboard_sidebar->getClass() ?? ''}}" href="#"><i
                        class="{{$dashboard_sidebar->getIcon() ?? ''}}"></i> {{$dashboard_sidebar->getLabel() ?? ''}}
                </a>
                @if(!is_null($dashboard_sidebar->getChildItem()))
                    <ul class="nav-dropdown-items">
                        @foreach($dashboard_sidebar->getChildItem() as $item_child)
                            <div @if(!is_null($item_child->getStyleCss()))
                                     style="{{$item_child->getStyleCss() ?? ''}}"
                                @endif>
                                <li class="nav-item">
                                    <a class="nav-link {{$item_child->getClass() ?? ''}}"
                                       href="{{$item_child->getRoute()}}"><i
                                            class="{{$item_child->getIcon() ?? ''}}"></i> {{$item_child->getLabel() ?? ''}}
                                    </a>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                @endif
            </li>
        </div>
    @endif
@endforeach