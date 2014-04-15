<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NBA Statistics</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> -->

    
  </head>
  <body>
    <!-- ================= -->
    <!--Presentation Tier-->
    <!-- ================= -->
    
    <h1>2012-2013 NBA Stats</h1>

    <br>

    <div class="row"> 
      <form role="form">
        <div class="col-sm-6">
          <input type="text" class="form-control" id="name_input" placeholder="Enter Player Name">   
        </div>
      </form>
    </div>

    <br>

    <table class="table table-hover" id="results">
      <tr id="table-headers">
        <th>Player Name</th>
        <th>GP</th>
        <th>FGP</th>
        <th>TPP</th>
        <th>FTP</th>
        <th>PPG</th>
      </tr>
    </table>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      
      //----------------
      //Business Tier	
      //----------------
      // Autocomplete search function
      $(function() {
        $(".form-control").keyup(function()
        {
          var playername = $(this).val();
          
          if(playername !== '') 
          {
            // Make AJAX call
            $.post('get_stats.php',{name: playername.toLowerCase()},showResults,'json');
          } 
          else if(playername == '') 
          {
          	$('.table_rows').html("");	
          } 
          return false;
        });

        
      });

      function showResults(response) 
      {
        
        // console.log(response[0].PlayerName);
        $('.table_rows').html("");
        for(var i=0; i < response.length; i++)
        {
          var tr="<tr class='table_rows'>";
          var td1="<td>"+response[i]["PlayerName"]+"</td>";
          var td2="<td>"+response[i]["GP"]+"</td>";
          var td3="<td>"+response[i]["FGP"]+"</td>";
          var td4="<td>"+response[i]["TPP"]+"</td>";
          var td5="<td>"+response[i]["FTP"]+"</td>";
          var td6="<td>"+response[i]["PPG"]+"</td></tr>";

          $('#results').append(tr+td1+td2+td3+td4+td5+td6);

        }
      }

    </script>

  </body>
</html>
