</div>
<div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
        <li><a href='#'>Privacy Policy</a></li>
        <!--<li><a href='#'>Team</a></li>-->
        <!--<li><a href='#'>Blog</a></li>-->
        <li><a href='mailto:wanna@beabandaid.co'>Contact Us</a></li>
        </ul>
      </div>
      <div class='navbar-text clearfix col-lg-12' style='font-size:0.8em; text-align:center'>
        <p>We respect your right to privacy. We will not give your name or personal information to third parties. No one will ever see your credit card information besides our payment processor, not even us.</p>
      </div>
      <div class='navbar-text clearfix pull-right'style='font-size:0.8em; text-align:center'>All content &copy; 2013 BandAid.</div>
  </footer>
  </div>


<!--<div id="getsat-widget-4965"></div>
<!--<script type="text/javascript" src="https://loader.engage.gsfn.us/loader.js"></script>
<script type="text/javascript">
if (typeof GSFN !== "undefined") { GSFN.loadWidget(4965,{"containerId":"getsat-widget-4965"}); }

  $(function() {

    $('.requiresLogin').click(function(e){
    if(typeof($.cookie('user[username]')) == 'undefined'){
      e.preventDefault();
      var link = $(this).attr('href');
      console.log($.cookie('user[lastPage]'));
      $.cookie('user[lastPage]', link,{ path: '/', domain:'beabandaid.co' });

      $('#loginModal').modal('show');
}
    });
  });

</script>-->
<!-- UserVoice JavaScript SDK (only needed once on a page) -->
<script>(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/fWT3Ps0BIBWaVJJFEVyuQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()</script>

<!-- A tab to launch the Classic Widget -->
<script>
        UserVoice = window.UserVoice || [];
        UserVoice.push(['showTab', 'classic_widget', {
          mode: 'full',
          primary_color: '#cc6d00',
          link_color: '#007dbf',
          default_mode: 'support',
          forum_id: 218421,
          tab_label: 'Feedback & Support',
          tab_color: '#cc6d00',
          tab_position: 'middle-right',
          tab_inverted: false
        }]);
</script>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Login</h3>
       </div>
       <div class="modal-body" style='text-align:center'>
              <form action='/login' method='post'>
            <p>If you already have an BandAid account, login below.</p>
              <input type='email' class='input-xlarge' name='login' placeholder='my@email.com' required><br>
              <input type='password' class='input-xlarge' name='password' placeholder='Password'><br>
              <br />
              <button class='btn' type='submit'>Login</button> or <a href='/signup' class='btn btn-info'>Signup</a><br>
        </form>
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /.endofmodelopener -->
</body>
</html>