@if ($message = Session::get('sucesso'))
   
          <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Parabens</span>
              <p> {{ $message }} </p>
            </div>
          </div>
 @endif