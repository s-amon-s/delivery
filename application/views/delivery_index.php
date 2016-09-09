<style>

@media screen and (min-width: 180px){
    .yokform{

    width: 82%;
    }
    .amon{
      margin: 0 auto;
    }
}

@media screen and (min-width: 480px){
  .yokform{

  width: 70%;
  }
  .amon{
    margin: 0 auto;
  }
}


@media screen and (min-width: 660px){
  .yokform{
  width: 29%;
  }
  .amon{
    margin: 0 auto;
  }
}
 
</style>

<form name="corporate_form" id="corporate_form" method="POST" enctype="application/x-www-form-urlencoded" action="#" onsubmit="check()" >
    <div class="form-group yokform container">
      <br /><br /><br /><br /><label for="Email">Email</label>
      <input type="email" class="form-control" name="Email" placeholder="                        amon@3g.edu" required><br />
      <label for="Password">Password</label>
      <input type="password" class="form-control" name="Password" placeholder="                                *****"><br />
        <label for="Email_Label">Email_Label</label>
        <input type="text" class="form-control" name="Email_Label" placeholder="Emails will be fetched from this Label" required><br />
        <label for="User_Name">User_Name</label>
        <input type="text" class="form-control" name="User_Name" placeholder="Username For This Bot" required><br />
        <label for="Channel">Channel</label>
        <input type="text" class="form-control" name="Channel" placeholder="Where to Post - groupName,#channel,@privateM" required> <br />
        <label for="Icon_Emoji">Icon_Emoji</label>
        <input type="text" class="form-control" name="Icon_Emoji" placeholder="                             Icon_Emoji">
        <a href="http://www.emoji-cheat-sheet.com/" target="_blank">Link To All The Emoji</a><br \><br />
        <label for="WebHook_URL">WebHook_URL</label>
        <input type="url" class="form-control" name="WebHook_URL" required><br />
        <label  for="love">Do You Love Amon ?</label>
        <input type="checkbox" name="love" class="input-small" checked><br /><br />
        <div class="amon" align="center">
        <input type="submit" class="btn btn-info" value="Submit" >
        </div>
      </div>
  </form>
 <script>
function check() {
    if(document.forms["my_form"]["Password"].value == "")
        document.forms["my_form"]["Password"].value = "empty";
    if(document.forms["my_form"]["Icon_Emoji"].value == "")
        document.forms["my_form"]["Icon_Emoji"].value = ":man_with_turban:";
    if(document.forms["my_form"]["love"].value == "")
        document.forms["my_form"]["love"].value = "checked";
  }
</script>
