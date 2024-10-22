<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/checkSession.php");
// Start Loggedon Header 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
// End Loggedon Header 

// Start Loggedon Mobile Menu 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); 
// End Loggedon Mobile Menu 
?>

<!-- main section -->
<main class="main-section logged-in promotions" role="container">
  <div class="data-table">
    <div class="container">
      <div class="row gx-3 py-5">
        <div class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap">
            <!-- <div class="entries-dropdown">
              <p class="text-white fw-bold mb-1">Show</p>
              <select class="form-select border-white shadow-none bg-transparent text-white ps-1 py-1 my-2">
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
              </select>
            </div>
            <div class="date date d-block d-md-flex">
              <p class="text-white fw-bold m-0 me-2">Search by Date:</p>
              <input type="text" id="entery-date" class="bg-transparent text-white border border-1 rounded-1 ps-1 py-1 my-2" value="2024/07/10">
            </div> -->
          </div>
          <!--Enteries-->
          <p class="text-white fw-bold mb-2 text-center text-md-start">Entries</p>
          <table class="table-fixed w-full" id="promotions">
              <thead>
                  <tr>
                    <th>Promotion Name</th>
                     <th>Promotion ID </th>
                     <th>Received On Date</th>
                  </tr>
              </thead>
              <tbody id="PromotiondataTableBody">
              </tbody>
          </table>
          <!--Page Numbers-->
          <!-- <div class="d-block d-lg-flex justify-content-between mt-3">
            <p class="text-white fw-bold">Showing 1 to 10 of 71 entries</p>
            <nav>
              <ul class="d-flex flex-wrap list-unstyled">
                <li><a class="px-3 text-white text-decoration-none fw-bold ps-auto ps-sm-0" href="#">Previous</a></li>
                <li><a class="px-3 text-white text-decoration-none" href="#">1</a></li>
                <li><a class="px-3 text-white text-decoration-none" href="#">2</a></li>
                <li><a class="px-3 text-white text-decoration-none" href="#">3</a></li>
                <li><a class="px-3 text-white text-decoration-none" href="#">4</a></li>
                <li><a class="px-3 text-white text-decoration-none" href="#">5</a></li>
                <span class="text-white">…</span>
                <li><a class="px-3 text-white text-decoration-none" href="#">8</a></li>
                <li><a class="px-3 text-white text-decoration-none fw-bold" href="#">Next</a></li>
              </ul>
            </nav>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function(){

      let promotion = new DataTable('#promotions');
  });
</script>
<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>
