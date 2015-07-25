    <div id="modalForm" class="modal fade"> <!--Modal start-->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Dodaj kontakt</h4>
          </div>
          <div class="modal-body">
             <form role="form" class="contact" method="post" action="/contact" enctype="multipart/form-data">
              <div class="form-group">
                <label for="first_name">Imię:</label>
                <input type="first_name" class="form-control" name="first_name" required>
              </div>
              <div class="form-group">
                <label for="last_name">Nazwisko:</label>
                <input type="last_name" class="form-control" name="last_name">
              </div>
              <div class="form-group">
                <label for="phone">Telefon:</label>
                <input type="phone" class="form-control" name="phone">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="city">Miasto:</label>
                <input type="city" class="form-control" name="city">
              </div>
              <div class="form-group">
                <label for="street">Ulica:</label>
                <input type="street" class="form-control" name="street">
              </div>
              <div class="form-group">
                <label for="house_number">Numer domu:</label>
                <input type="house_number" class="form-control" name="house_number">
              </div>
              <div class="form-group">
                <label for="pwd">Województwo:</label>
                <select class="form-control" id="TempProvinceCode" name="county">
                    <option value="">-- wybierz --</option>
                    <option value="dolnośląskie">dolnośląskie</option>
                    <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                    <option value="lubelskie">lubelskie</option>
                    <option value="lubuskie">lubuskie</option>
                    <option value="łódzkie">łódzkie</option>
                    <option value="małopolskie">małopolskie</option>
                    <option value="mazowieckie">mazowieckie</option>
                    <option value="opolskie">opolskie</option>
                    <option value="podkarpackie">podkarpackie</option>
                    <option value="podlaskie">podlaskie</option>
                    <option value="pomorskie">pomorskie</option>
                    <option value="śląskie">śląskie</option>
                    <option value="świętokrzyskie">świętokrzyskie</option>
                    <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                    <option value="wielkopolskie">wielkopolskie</option>
                    <option value="zachodniopomorskie">zachodniopomorskie</option>
                </select>		
              </div>
              <div class="form-group">
                <label for="zip_code">Kod pocztowy:</label>
                <input type="zip_code" class="form-control" name="zip_code">
              </div>
              <div class="form-group">
                <label for="pwd">Zdjęcie:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            <input class="btn btn-success" type="submit" value="Dodaj kontakt" id="submit">
          </div>
            </form>
          
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->