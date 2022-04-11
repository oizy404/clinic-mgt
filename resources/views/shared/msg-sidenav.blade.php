<div class="main_body">  
  <div class="sidebar_menu">
    <div class="inner__sidebar_menu">
    <hr>

        <div class="patient-msgs">
            <table>
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @if($user->first()->id == Auth::id())
                    @else
                    <tr>
                        <td style="display:none;">{{$user->first()->id}}</td>
                        <td>
                            <a href="{{route('clinicstaffViewCreate', $user->first()->id)}}">{{$user->first()->username}}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    
      <div class="hamburger">
        <div class="inner_hamburger">
            <span class="arrow">
                <i class="fas fa-long-arrow-alt-left"></i>
                <i class="fas fa-long-arrow-alt-right"></i>
            </span>
        </div>
      </div>
    </div>
  </div>   