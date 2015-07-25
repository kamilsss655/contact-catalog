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
                    <option value="0200000">dolnośląskie</option>
                    <option value="0400000">kujawsko-pomorskie</option>
                    <option value="0600000">lubelskie</option>
                    <option value="0800000">lubuskie</option>
                    <option value="1000000">łódzkie</option>
                    <option value="1200000">małopolskie</option>
                    <option value="1400000">mazowieckie</option>
                    <option value="1600000">opolskie</option>
                    <option value="1800000">podkarpackie</option>
                    <option value="2000000">podlaskie</option>
                    <option value="2200000">pomorskie</option>
                    <option value="2400000">śląskie</option>
                    <option value="2600000">świętokrzyskie</option>
                    <option value="2800000">warmińsko-mazurskie</option>
                    <option value="3000000">wielkopolskie</option>
                    <option value="3200000">zachodniopomorskie</option>
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
            <input class="btn btn-success" type="submit" value="Send!" id="submit">
          </div>
            </form>
          
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->