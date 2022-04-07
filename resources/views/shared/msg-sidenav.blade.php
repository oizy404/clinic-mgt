<div class="main_body">  
  <div class="sidebar_menu">
    <div class="inner__sidebar_menu">
    <hr>

        <div class="patient-msgs">
            <table>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>

                            <a href="">{{$user->username}}</a>
                        </td>
                    </tr>
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
    
    



