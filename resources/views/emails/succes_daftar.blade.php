
<style type="text/css">
  .container {
    width:100%;
    border:1px solid #dddddd;
    box-shadow: 2px 2px 1px #e1e6e4;
    padding:15px;
  }
  </style>
  
  <div style="text-align:left">
    <div class="container">
      <img style="max-width: 300px; width: 100%" src="{{ env('LOGO') }}" /><br />
      <p>Terimah kasih telah mendaftar kurba di baznas</p>
      <p>Berikut account login dashboard anda:</p>
      {!! $email_text !!}
      <div style="font-size:10px;margin-top:25px;">
        <a href="#">Baznas parepare</a>
      </div>
    </div>
  </div>
  