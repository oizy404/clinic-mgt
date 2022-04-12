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
                    @foreach($patients as $patient)

                        @if($user->first()->id == Auth::id())
                        @else
                            @if($user->first()->username == $patient->school_id)
                            <tr>
                                <td style="display:none;">{{$user->first()->id}}</td>
                                <?php 
                                    $fullname = $patient->first_name." ".$patient->last_name;
                                ?>
                                <td>
                                    <img src="{{ Avatar::create($fullname)->toBase64()}}" class="patient-avatar" alt="patient-avatar">
                                    <a href="{{route('doctorViewCreate', $user->first()->id)}}">{{$patient->first_name}} {{$patient->last_name}}</a>
                                </td>
                                
                            </tr>
                            @endif
                        @endif
                    @endforeach
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