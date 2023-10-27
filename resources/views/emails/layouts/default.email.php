<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
      @media only screen {
        html {
          min-height: 100%;
          background: #f6f6f6; }
      }

      @media only screen and (max-width: 596px){
        .small-float-center {
          margin: 0 auto !important;
          float: none !important;
          text-align: center !important; }
        .small-text-center {
          text-align: center !important; }
        .small-text-left {
          text-align: left !important; }
        .small-text-right {
          text-align: right !important; }

        .hide-for-large {
          display: block !important;
          width: auto !important;
          overflow: visible !important;
          max-height: none !important;
          font-size: inherit !important;
          line-height: inherit !important; }

        table.body table.container .hide-for-large,
        table.body table.container .row.hide-for-large {
          display: table !important;
          width: 100% !important; }

        table.body table.container .callout-inner.hide-for-large {
          display: table-cell !important;
          width: 100% !important; }

        table.body table.container .show-for-large {
          display: none !important;
          width: 0;
          mso-hide: all;
          overflow: hidden; }

        table.body img {
          width: auto;
          height: auto; }
        table.body center {
          min-width: 0 !important; }
        table.body .container {
          width: 95% !important; }
        table.body .columns,
        table.body .column {
          height: auto !important;
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
          padding-left: 16px !important;
          padding-right: 16px !important; }
          table.body .columns .column,
          table.body .columns .columns,
          table.body .column .column,
          table.body .column .columns {
            padding-left: 0 !important;
            padding-right: 0 !important; }
        table.body .collapse .columns,
        table.body .collapse .column {
          padding-left: 0 !important;
          padding-right: 0 !important; }
        td.small-1,
        th.small-1 {
          display: inline-block !important;
          width: 8.33333% !important; }
        td.small-2,
        th.small-2 {
          display: inline-block !important;
          width: 16.66667% !important; }
        td.small-3,
        th.small-3 {
          display: inline-block !important;
          width: 25% !important; }
        td.small-4,
        th.small-4 {
          display: inline-block !important;
          width: 33.33333% !important; }
        td.small-5,
        th.small-5 {
          display: inline-block !important;
          width: 41.66667% !important; }
        td.small-6,
        th.small-6 {
          display: inline-block !important;
          width: 50% !important; }
        td.small-7,
        th.small-7 {
          display: inline-block !important;
          width: 58.33333% !important; }
        td.small-8,
        th.small-8 {
          display: inline-block !important;
          width: 66.66667% !important; }
        td.small-9,
        th.small-9 {
          display: inline-block !important;
          width: 75% !important; }
        td.small-10,
        th.small-10 {
          display: inline-block !important;
          width: 83.33333% !important; }
        td.small-11,
        th.small-11 {
          display: inline-block !important;
          width: 91.66667% !important; }
        td.small-12,
        th.small-12 {
          display: inline-block !important;
          width: 100% !important; }
        .columns td.small-12,
        .column td.small-12,
        .columns th.small-12,
        .column th.small-12 {
          display: block !important;
          width: 100% !important; }
        table.body td.small-offset-1,
        table.body th.small-offset-1 {
          margin-left: 8.33333% !important;
          Margin-left: 8.33333% !important; }
        table.body td.small-offset-2,
        table.body th.small-offset-2 {
          margin-left: 16.66667% !important;
          Margin-left: 16.66667% !important; }
        table.body td.small-offset-3,
        table.body th.small-offset-3 {
          margin-left: 25% !important;
          Margin-left: 25% !important; }
        table.body td.small-offset-4,
        table.body th.small-offset-4 {
          margin-left: 33.33333% !important;
          Margin-left: 33.33333% !important; }
        table.body td.small-offset-5,
        table.body th.small-offset-5 {
          margin-left: 41.66667% !important;
          Margin-left: 41.66667% !important; }
        table.body td.small-offset-6,
        table.body th.small-offset-6 {
          margin-left: 50% !important;
          Margin-left: 50% !important; }
        table.body td.small-offset-7,
        table.body th.small-offset-7 {
          margin-left: 58.33333% !important;
          Margin-left: 58.33333% !important; }
        table.body td.small-offset-8,
        table.body th.small-offset-8 {
          margin-left: 66.66667% !important;
          Margin-left: 66.66667% !important; }
        table.body td.small-offset-9,
        table.body th.small-offset-9 {
          margin-left: 75% !important;
          Margin-left: 75% !important; }
        table.body td.small-offset-10,
        table.body th.small-offset-10 {
          margin-left: 83.33333% !important;
          Margin-left: 83.33333% !important; }
        table.body td.small-offset-11,
        table.body th.small-offset-11 {
          margin-left: 91.66667% !important;
          Margin-left: 91.66667% !important; }
        table.body table.columns td.expander,
        table.body table.columns th.expander {
          display: none !important; }
        table.body .right-text-pad,
        table.body .text-pad-right {
          padding-left: 10px !important; }
        table.body .left-text-pad,
        table.body .text-pad-left {
          padding-right: 10px !important; }
        table.menu {
          width: 100% !important; }
          table.menu td,
          table.menu th {
            width: auto !important;
            display: inline-block !important; }
          table.menu.vertical td,
          table.menu.vertical th, table.menu.small-vertical td,
          table.menu.small-vertical th {
            display: block !important; }
        table.menu[align="center"] {
          width: auto !important; }
        table.button.small-expand,
        table.button.small-expanded {
          width: 100% !important; }
          table.button.small-expand table,
          table.button.small-expanded table {
            width: 100%; }
            table.button.small-expand table a,
            table.button.small-expanded table a {
              text-align: center !important;
              width: 100% !important;
              padding-left: 0 !important;
              padding-right: 0 !important; }
          table.button.small-expand center,
          table.button.small-expanded center {
            min-width: 0; }
      }
    </style>
  </head>
  <body>
    @hasSection('preheader')
    <span class="preheader">@yield('preheader')</span>
    @endif
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td class="float-center" align="center" valign="top">
          <center>
            <table align="center" class="container float-center">
              <tbody>
                <tr>
                  <td>
                    <table class="spacer">
                      <tbody>
                        <tr>
                          <td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- START_HEADER -->
                    <table class="row header">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <a href="{!!$tpl_site_url!!}" title="{{$tpl_site_name}}" target="_blank">
                                    <img src="{!!$tpl_site_url!!}/img/logo.png" title="{{$tpl_site_name}}" alt="logo" width="253" height="75" align="center" class="float-center">
                                  </a>
                                </th>
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <!-- END_HEADER -->

                    <!-- START_CONTENT -->
                    <table class="row content">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <table class="spacer">
                                    <tbody>
                                      <tr>
                                        <td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  @yield('content')
                                </th>
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <!-- END_CONTENT -->

                    <table class="spacer">
                      <tbody>
                        <tr>
                          <td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- START_FOOTER -->
                    <table class="row footer">
                      <tbody>
                        <tr>
                          <th class="small-12 large-12 columns first last">
                            <table>
                              <tr>
                                <th>
                                  <span class="text-center"><small>&copy; {{date('Y')}} AyiConnect - All Rights Reserved.</small></span>
                                  @hasSection('unsubscribe_link')
                                  <span class="text-center"><small>Don't like these emails? <a href="@yield('unsubscribe_link')">Unsubscribe</a>.</small></span>
                                  @endif
                                </th>
                                <th class="expander"></th>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                    <!-- END_FOOTER -->
                  </td>
                </tr>
              </tbody>
            </table>
          </center>
        </td>
      </tr>
    </table>
  </body>
</html>
