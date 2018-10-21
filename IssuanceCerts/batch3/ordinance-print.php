<?php 
      session_start();
      include('../../Level0_Config.php');
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.2.363"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "ordinance-print.css"], "outOfDate":[]};
</script>
  
  <title>Ordinance print</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/ordinance-print.css?crc=4055593127" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu1698"><!-- group -->
     <div class="clip_frame grpelem" id="u1698"><!-- image -->
      <?php
      include_once('../../dbconn.php');

      $ImageSQL = 'SELECT * FROM bitdb_r_config';
      $ImageQuery = mysqli_query($bitMysqli,$ImageSQL) or die (mysqli_error($bitMysqli));
      if(mysqli_num_rows($ImageQuery) > 0)
      {
        while($row = mysqli_fetch_assoc($ImageQuery))
        {
          $BSeal = $row['BarangaySeal'];
          $MSeal = $row['MunicipalSeal'];
          echo '
                 <img class="block" id="u1698_img" src="../../images/'.$BSeal.'" alt="" width="94" height="90"/>
                 ';
        }
      }
     ?>
      <!-- <img class="block" id="u1698_img" src="images/barangay%20logo94x91.png?crc=4088107419" alt="" width="94" height="90"/> -->
     </div>
     <div class="clearfix grpelem" id="u1690"><!-- column -->
      <div class="clearfix colelem" id="u1693-4"><!-- content -->
       <p><span id="u1693">Republic of the Philippines</span></p>
      </div>
      <div class="clearfix colelem" id="u1692-4"><!-- content -->
        <?php
          include_once('../../dbconn.php');

          $configSQL = 'SELECT * FROM bitdb_r_config';
          $configQuery = mysqli_query($bitMysqli,$configSQL) or die (mysqli_error($bitMysqli));
          if(mysqli_num_rows($configQuery) > 0)
          {
            while($row = mysqli_fetch_assoc($configQuery))
            {
              $Barangay = $row['BarangayName'];
              $Municipality = $row['Municipality'];
              $Province = $row['ProvinceName'];
              echo '
                  <p>'.$Province.'</p>
                  </div>
                  <div class="clearfix colelem" id="u1691-4">
                   <p>City of '.$Municipality.'</p>
                  </div>
                  <div class="clearfix colelem" id="pu1694-4">
                    <div class="clearfix grpelem" id="u1694-4">
                    <p>'.$Barangay.'</p>';
            }
          }
        ?>
       </div>
       <div class="clearfix grpelem" id="u1695-4"><!-- content -->
        <p>OFFICE OF THE SANGGUNIANG BARAGAY</p>
       </div>
      </div>
     </div>
     <div class="clip_frame grpelem" id="u1681"><!-- image -->
      <?php
      include_once('../../dbconn.php');

      $ImageSQL = 'SELECT * FROM bitdb_r_config';
      $ImageQuery = mysqli_query($bitMysqli,$ImageSQL) or die (mysqli_error($bitMysqli));
      if(mysqli_num_rows($ImageQuery) > 0)
      {
        while($row = mysqli_fetch_assoc($ImageQuery))
        {
          $BSeal = $row['BarangaySeal'];
          $MSeal = $row['MunicipalSeal'];
          echo '                 
          <img class="block" id="u1681_img" src="../../images/'.$MSeal.'" alt="" width="91" height="86"/>
                 ';
        }
      }
     ?>
      <!-- <img class="block" id="u1681_img" src="images/provincelogo.png?crc=3870925005" alt="" width="91" height="86"/> -->
     </div>
    </div>
    <div class="colelem" id="u1687"><!-- simple frame --></div>
    <div class="clearfix colelem" id="u1887-4"><!-- content -->
     <p>Ordinance Title</p>
    </div>
    <div class="clearfix colelem" id="pu1890-5"><!-- group -->
     <div class="clearfix grpelem" id="u1890-5"><!-- content -->
      <?php
        include_once('../../dbconn.php');

        $OrdinanceSQL = 'SELECT bitdb_r_ordinance.OrdinanceID,
                                bitdb_r_ordinance.OrdinanceTitle,
                                bitdb_r_ordinance.CategoryID,
                                bitdb_r_ordinance.Persons_Involved,
                                bitdb_r_ordinance.OrdDesc,
                                bitdb_r_ordinance.DateImplemented,
                                bitdb_r_ordinance.OrdStatus,
                                bitdb_r_ordinance.Sanction,
                                bitdb_r_ordinanceauthor.Author,
                                IFNULL(bitdb_r_citizen.First_Name,"") AS First_Name,
                                IFNULL(bitdb_r_citizen.Middle_Name,"") AS Middle_Name,
                                IFNULL(bitdb_r_citizen.Last_Name,"") AS Last_Name,
                                IFNULL(bitdb_r_citizen.Name_Ext,"") AS Name_Ext,
                                bitdb_r_ordinancecategory.OrdinanceTitle AS Category
                          FROM bitdb_r_ordinance 
                          INNER JOIN bitdb_r_ordinancecategory
                          ON bitdb_r_ordinance.CategoryID = bitdb_r_ordinancecategory.OrdCategoryID
                          INNER JOIN bitdb_r_ordinanceauthor
                          ON bitdb_r_ordinanceauthor.OrdinanceID = bitdb_r_ordinance.OrdinanceID
                          LEFT JOIN bitdb_r_citizen
                          ON bitdb_r_citizen.Citizen_ID = bitdb_r_ordinance.Persons_Involved
                          WHERE bitdb_r_ordinance.OrdinanceID='.$_GET['OrdinanceID'].'';
        $OrdinanceQuery = mysqli_query($bitMysqli,$OrdinanceSQL) or die (mysqli_error($bitMysqli));
        if(mysqli_num_rows($OrdinanceQuery) > 0)
        {
          while($row = mysqli_fetch_assoc($OrdinanceQuery))
          {
            echo'
                </div>
                 <div class="clearfix grpelem">
                  <p>'.$row['OrdinanceTitle'].'</p>
                 </div>
                </div>
                <div class="clearfix colelem" id="pu1899-4">
                 <div class="clearfix grpelem" id="u1899-4">
                  <p>Category:_____________________________________________________________</p>
                 </div>
                 <div class="clearfix grpelem" id="u2063-4">
                  <p>'.$row['Category'].'</p>
                 </div>
                </div>
                <div class="clearfix colelem" id="pu1902-4">
                 <div class="clearfix grpelem" id="u1902-4">
                  <p>Authors: ______________________________________________________________</p>
                 </div>
                 <div class="clearfix grpelem" id="u2069-4">
                  '.$row['Author']./* ;
            $AuthorSQL = 'SELECT bitdb_r_ordinanceauthor.Author FROM bitdb_r_ordinanceauthor WHERE bitdb_r_ordinanceauthor.OrdinanceID='.$_GET['OrdinanceID'].' ';
            $AuthorQuery = mysqli_query($bitMysqli,$AuthorSQL) or die ($bitMysqli);
            if(mysqli_num_rows($AuthorQuery) > 0)
            {
              echo'<p>';
              while($row2 = mysqli_fetch_assoc($AuthorQuery))
              {
                echo''.$row2['Author'].',';
              }
              echo'</p>';
            }
            echo   */'
                 </div>
                </div>
                <div class="clearfix colelem" id="pu1905-4">
                 <div class="clearfix grpelem" id="u1905-4">
                  <p>Officials Involved: _______________________________________________________</p>
                 </div>
                 <div class="clearfix grpelem" id="u2072-4">
                  <p>'.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].''.'</p>
                 </div>
                </div>
                <div class="clearfix colelem" id="u1908-4">
                 <p>Description:</p>
                </div>
                <div class="clearfix colelem" id="u1911-4">
                 <p>'.$row['OrdDesc'].'</p>
                </div>
                <div class="clearfix colelem" id="pu1914-4">
                 <div class="clearfix grpelem" id="u1914-4">
                  <p>Sanction: _____________________________________________________________</p>
                 </div>
                 <div class="clearfix grpelem" id="u2075-4">
                  <p>'.$row['Sanction'].'</p>
                 </div>
                </div>
                <div class="clearfix colelem" id="pu1920-4">
                 <div class="clearfix grpelem" id="u1920-4">
                  <p>Date&nbsp; of Implementation: _________________________________________________</p>
                 </div>
                 <div class="clearfix grpelem" id="u2078-4">
                  <p>&nbsp;'.$row['DateImplemented'].'</p>
                 </div>
                </div>
                ';
          }
        }
      ?>
      <!-- <p><span id="u1890">Ordinance No.</span> _________</p> -->
     <!-- </div>
     <div class="clearfix grpelem" id="u1893-4">
      <p>001</p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1899-4">
     <div class="clearfix grpelem" id="u1899-4">
      <p>Category:_____________________________________________________________</p>
     </div>
     <div class="clearfix grpelem" id="u2063-4">
      <p>Peace and Order</p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1902-4">
     <div class="clearfix grpelem" id="u1902-4">
      <p>Authors: ______________________________________________________________</p>
     </div>
     <div class="clearfix grpelem" id="u2069-4">
      <p>Ako, Ikaw, Sila, Tayong lahat!! HAHAHA</p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1905-4">
     <div class="clearfix grpelem" id="u1905-4">
      <p>Officials Involved: _______________________________________________________</p>
     </div>
     <div class="clearfix grpelem" id="u2072-4">
      <p>Si Mayora ng barangay</p>
     </div>
    </div>
    <div class="clearfix colelem" id="u1908-4">
     <p>Description:</p>
    </div>
    <div class="clearfix colelem" id="u1911-4">
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="clearfix colelem" id="pu1914-4">
     <div class="clearfix grpelem" id="u1914-4">
      <p>Sanction: _____________________________________________________________</p>
     </div>
     <div class="clearfix grpelem" id="u2075-4">
      <p>Death huhu</p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1920-4">
     <div class="clearfix grpelem" id="u1920-4">
      <p>Date&nbsp; of Implementation: _________________________________________________</p>
     </div>
     <div class="clearfix grpelem" id="u2078-4">
      <p>&nbsp;11/12/2017</p>
     </div>
    </div> -->
    <div class="colelem" id="u1923"><!-- content --></div>
    <div class="verticalspacer" data-offset-top="559" data-content-above-spacer="559" data-content-below-spacer="0"></div>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=4152223963" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
