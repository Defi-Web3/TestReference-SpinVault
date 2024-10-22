<?php session_start(); include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/checkSession.php");
// Start Loggedon Header 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
// End Loggedon Header 

// Start Loggedon Mobile Menu 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); 
// End Loggedon Mobile Menu 
?>

<!-- main section -->
<main class="main-section logged-in redeemprize" role="container">
  <div class="container">
    <div class="row gx-3 py-5 items">
      <div class="col-md-12">
        <div class="tab-content" id="tab-content" aria-orientation="vertical">
          <div class="tab-pane active" id="vertical-tabpanel-2" role="tabpanel" aria-labelledby="vertical-tab-2">
            <div class="redeemContainer">
              <div class="redeemHeader">
                <h3>Redeemable Coins</h3>
                <div class="textGray">
                  <p class="mb-0">All SC Coins must be played at least once to become redeemable.</p>
                  <p>For every SC 1 redeemed, you will receive $1.00</p>
                  <p>Minimum redemption is SC 100</p>
                </div>
              </div> 

              <div class="redeemBody">
                <div class="bodyTitle">
                  <h4>BALANCE OVERVIEW</h4>
                </div>
                <div class="bodyContent py-3">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 col-lg-6 ps-lg-0 py-2">
                        <div class="goldCoins w-100">
                          <div class="title">
                            GOLD COINS
                          </div>
                          <div class="content">
                            <div><span id="redeemableGcCoins">GC 1,219,150.00 </span></div>
                            <img class="gCoin" src="g-coin.webp" alt="">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6 pe-lg-0 py-2">
                        <div class="starsCoins w-100">
                          <div class="title">
                            STARS COINS
                          </div>
                          <div class="content">
                            <div><span id="redeemableFcCoins">SC 280.80 </span></div>
                            <img class="sCoin" src="s-coin.webp" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="bodyFooter text-end pe-1 mb-2">
                  <strong><span style="font-family: SiteFontBold">Redeemable Coins: </span><span id="redeemableCoins"></span></strong>
                </div>

                <!-- START COINS SHOP -->
                <div class="starsplay-model-box starsplay-shopcoin modal fade" id="redeemModal" tabindex="1" aria-labelledby="redeemModal" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);max-width: 800px;max-height: 85vh;overflow-y: auto;padding: 0!important;">
                    <div class="modal-content text-white" style="">

                      <div class="px-0 px-sm-2" style="-webkit-overflow-scrolling: touch; ">
                        <div class="redeemAmountSection pb-3">
                          <label for="redeemAmount" class="fw-bold">How many Star Coins would you like to redeem?</label>
                          <div class="redeemInputContainer">
                            <div class="currencyBox rounded-1 d-flex justify-content-center align-items-center" style="font-weight: 100!important;"><span id="currentRedeemCurrency">SC</span></div>
                            <input class="w-100 fw-medium p-2 rounded-1 fs-4 text-black" target-form="redeem-amount" type="number" name="redeemAmount" id="redeemAmount" min="0" required="">
                            <div class="availableBox rounded-1 text-center" style="font-weight: 100!important;"><span id="currentRedeemAmount">39.80</span>
                              <div></div><span> available</span>
                            </div>
                          </div>
                          <span class="errorMessage" id="errorRedeemAmount">SC 100.00 Minimum</span>

                          <div class="displayRedeem fs-6 text-center p-3" style="border: 1px solid white;font-weight: 100!important;">
                            <p>The redeemed value of your sweepstakes prize will be</p>
                            <strong>$<span id="displayRedeemAmount">0.00</span> USD</strong>
                          </div>
                        </div>

                        <div class="paymentMethodContainer w-100 mb-2">
                          <div class="container">
                            <div class="row">
                              <div class="col-12 col-md-6 px-0">
                                <label for="paymentMethodSelect" class="mb-2">Redeem options:</label>
                                <select class="form-select" id="paymentMethodSelect" aria-label="Default select example">
                                  <option value="bankTransferSection" selected="">Bank transfer</option>
                                  <option value="cryptoSection">Crypto currency</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="bar my-3"></div>

                        <form class="text-white d-flex justify-content-center flex-column align-items-center pb-3" id="redeemModalForm">
                          <div id="bankTransferSection" class="w-100">
                            <div class="mb-3 col-12">
                              <label for="bankAccountName" class="fw-bold">Name on Account<span class="text-danger">*</span></label>
                              <input class="w-100 px-2 rounded-1 fs-5 text-black" type="text" name="bankAccountName" id="bankAccountName" required="">
                            </div>
                            <div class="mb-3 col-12">
                              <label for="bankName" class="fw-bold">Bank Name<span class="text-danger">*</span></label>
                              <input class="w-full px-2 rounded-1 fs-5" type="text" name="bankName" id="bankName" required="">
                            </div>
                            <div class="mb-3 col-12">
                              <label for="bankRoutingNumber" class="fw-bold">Routing Number<span class="text-danger">*</span></label>
                              <input maxlength="9" class="w-full px-2 rounded-1 fs-5" type="text" name="bankRoutingNumber" id="bankRoutingNumber" required="">
                            </div>
                            <div class="mb-5 col-12">
                              <label for="bankAccountNumber" class="fw-bold">Account Number<span class="text-danger">*</span></label>
                              <input maxlength="12" class="w-full px-2 rounded-1 fs-5" type="text" name="bankAccountNumber" id="bankAccountNumber" required="">
                            </div>
                          </div>

                          <div id="cryptoSection" class="w-100 d-none">
                            <div class="mb-3 col-12">
                              <label for="idWalletCrypto" class="fw-bold">Wallet ID<span class="text-danger">*</span></label>
                              <input class="w-100 px-2 py-1 rounded-1 fs-5 text-black" type="text" name="idWalletCrypto" id="idWalletCrypto" required="">
                            </div>
                            <div class="mb-3 col-12">
                              <label for="idCurrencyCrypto" class="fw-bold">Currency<span class="text-danger">*</span></label>
                              <!-- <input class="w-100 px-2 rounded-1 fs-5 text-black" type="text" name="idCurrencyCrypto" id="idCurrencyCrypto" required> -->
                              <select class="w-100 p-2 rounded-1 fs-5 text-black" name="idCurrencyCrypto" id="idCurrencyCrypto" required="">
                                <option value="BTC" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">Bitcoin</option>
                                <option value="BCH" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">Bitcoin Cash</option>
                                <option value="ETH" data-img="/assets/img/Payments/Crypto/ethereum-cryptocurrency.svg">Ethereum</option>
                                <option value="LTC" data-img="/assets/img/Payments/Crypto/litecoin-cryptocurrency.svg">Litecoin</option>
                                <option value="USDT" data-img="/assets/img/Payments/Crypto/tether-cryptocurrency.svg">Tether USD (ERC20)</option>
                                <option value="USDT_TRC20" data-img="/assets/img/Payments/Crypto/tether-cryptocurrency.svg">Tether USD (TRC20)</option>
                                <option value="USDT_POLYGON" data-img="/assets/img/Payments/Crypto/tether-cryptocurrency.svg">Tether USD (POLYGON)</option>
                                <option value="USDC" data-img="/assets/img/Payments/Crypto/usd-coin-cryptocurrency.svg">USD Coin (ERC20)</option>
                                <option value="USDC_POLYGON" data-img="/assets/img/Payments/Crypto/usd-coin-cryptocurrency.svg">USD Coin (POLYGON)</option>
                                <option value="USDCE_POLYGON" data-img="/assets/img/Payments/Crypto/usd-coin-cryptocurrency.svg">USD Coin Bridge (POLYGON)</option>
                                <option value="HOM" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">House of Mandela Token</option>
                                <option value="PROPT" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">ProperT</option>
                                <option value="PROPT_POLYGON" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">ProperT (POLYGON)</option>
                                <option value="DASH" data-img="/assets/img/Payments/Crypto/dash-cryptocurrency.svg">Dash</option>
                                <option value="TRX" data-img="/assets/img/Payments/Crypto/bitcoin-cryptocurrency.svg">Tron</option>
                                <option value="MATIC" data-img="/assets/img/Payments/Crypto/matic-network-cryptocurrency.svg">Matic</option>
                              </select>
                            </div>
                          </div>

                          <span class="text-warning fst-italic" style="font-weight: 100!important;">We will process your payment as soon as you submit this form. The payment might take up to <strong style="font-weight: bold!important;">3 working days</strong> to be visible into your account</span>
                          <div class="accordion mt-2 mb-4 w-100" id="accordionExample">
                            <div class="accordion-item text-white w-100 bgTransparent">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="bgTransparent accordion-button collapsed text-white border-0 fw-bold text-uppercase text-sm ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  My Account
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-0 text-white fw-bold text-sm">
                                  <div class="container p-0">
                                    <div class="row mb-2">
                                      <div class="col-12 col-md-6">
                                        <label class="my-1" for="acc_FirstName">Account Name<span class="text-danger">*</span></label>
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_FirstName" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">First name</span>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <label class="my-1" for="acc_LastName"><span style="visibility: hidden;">Account Name</span></label>
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_LastName" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">Last name</span>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col-12 col-md-6">
                                        <label class="my-1" for="acc_Email">Email<span class="text-danger">*</span></label>
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_Email" readonly="">
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <label class="my-1" for="acc_Phone">Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_Phone" readonly="">
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col-12">
                                        <label class="my-1" for="acc_BillingAddress">Billing Address<span class="text-danger">*</span></label>
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_BillingAddress" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">Address</span>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col-12 col-md-6">
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_Country" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">Country</span>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_State" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">State / Region</span>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col-12 col-md-6">
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_City" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">City</span>
                                      </div>
                                      <div class="col-12 col-md-6">
                                        <input type="text" class="w-100 px-2 py-1 rounded-1 fs-5" id="acc_ZipCode" readonly="">
                                        <span class="my-1 d-block" style="font-weight: 100!important;">ZIP Code</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="d-flex col-12 mb-2">
                            <button type="submit" class="btn-gradient btn btn-bg text-white custom-button px-3 py-2 text-uppercase fw-bold mb-3 rounded-2" id="submitRedeemModal">Submit</button>
                          </div>
                          <div class="w-100">
                            <span id="errorSubmitRedeem" class="text-warning"></span>
                          </div>
                          <div class="w-100">
                            <span id="successSubmitRedeem" class="text-success"></span>
                          </div>

                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion mt-2 mb-4 w-100 data-table" id="accordionExample">
                <div class="accordion-item text-white w-100 bgTransparent">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="bgTransparent accordion-button collapsed text-white border-0 fw-bold text-uppercase text-sm px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Requests History
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0 text-white fw-bold text-sm">
                      <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="historyTableContainer text-white">
                              <div class="tableTitle">
                                <!-- <span>Entries</span> -->
                              </div>
                              <div>
                                <div id="dataTableCashout_wrapper" class="dt-container"><div class="dt-layout-row"><div class="dt-layout-cell dt-layout-start"><div class="dt-length"><label for="dt-length-0">Show <div class="py-1 dataTablesSelect"><select name="dataTableCashout_length" aria-controls="dataTableCashout" class="dt-input" id="dt-length-0"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option></select></div> Entries</label></div></div><div class="dt-layout-cell dt-layout-end"><div class="dt-search"><label for="dt-search-0"><div>Search:</div></label><input type="search" class="dt-input" id="dt-search-0" placeholder="" aria-controls="dataTableCashout"></div></div></div><div class="dt-layout-row dt-layout-table"><div class="dt-layout-cell  dt-layout-full"><table id="dataTableCashout" class="display table table-dark table-hover historyTable dataTable" style="width: 100%;" aria-describedby="dataTableCashout_info"><colgroup><col data-dt-column="0" style="width: 0px;"><col data-dt-column="1" style="width: 0px;"><col data-dt-column="2" style="width: 0px;"></colgroup>
                                  <thead>
                                    <tr role="row"><th data-dt-column="0" rowspan="1" colspan="1" class="dt-type-date dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="Date: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th><th data-dt-column="1" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th><th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th></tr>
                                  </thead>
                                  <tbody id="dataTableCashoutBody"><tr>
                                    <td class="dt-type-date sorting_1">2024-09-14 13:08:35</td>
                                    <td class="dt-type-numeric">100.00 $</td>
                                    <td>request</td>
                                  </tr><tr>
                                    <td class="dt-type-date sorting_1">2024-09-14 12:50:14</td>
                                    <td class="dt-type-numeric">150.00 $</td>
                                    <td>request</td>
                                  </tr></tbody>
                                  <tfoot>
                                    <tr role="row"><th data-dt-column="0" rowspan="1" colspan="1" class="dt-type-date"><span class="dt-column-title">Date</span></th><th data-dt-column="1" rowspan="1" colspan="1" class="dt-type-numeric"><span class="dt-column-title">Amount</span></th><th data-dt-column="2" rowspan="1" colspan="1"><span class="dt-column-title">Status</span></th></tr>
                                  </tfoot>
                                </table></div></div><div class="dt-layout-row"><div class="dt-layout-cell dt-layout-start"><div class="dt-info" aria-live="polite" id="dataTableCashout_info" role="status">Showing 1 to 2 of 2 entries</div></div><div class="dt-layout-cell dt-layout-end"><div class="dt-paging"><nav><button class="dt-paging-button disabled first" role="link" type="button" aria-controls="dataTableCashout" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1">«</button><button class="dt-paging-button disabled previous" role="link" type="button" aria-controls="dataTableCashout" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</button><button class="dt-paging-button current" role="link" type="button" aria-controls="dataTableCashout" aria-current="page" data-dt-idx="0">1</button><button class="dt-paging-button disabled next" role="link" type="button" aria-controls="dataTableCashout" aria-disabled="true" aria-label="Next" data-dt-idx="next" tabindex="-1">›</button><button class="dt-paging-button disabled last" role="link" type="button" aria-controls="dataTableCashout" aria-disabled="true" aria-label="Last" data-dt-idx="last" tabindex="-1">»</button></nav></div></div></div></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="redeemBtnContainer py-4 d-flex align-items-center justify-content-center">
                <a href="/pages/loggedOn/verification.php" id="buttonCompleteKyc"  class="btn-gradient btn-gradient-link account-btn fw-bold text-uppercase py-2 px-4 d-flex rounded">COMPLETE KYC TO REDEEM</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>
<script>
// Function to set up redeemable
async function setupRedeemable() {
    try {
        // API URL for redeeming
        const redeemUrl = 'https://spinvaultpreprod.sweepium.com:4003/Get_REDEEM';

        // Retrieve user data from localStorage
        const storedData = JSON.parse(localStorage.getItem('userData'));

        // Extract the token and idPlayer from storedData
        const token = storedData?.data?.token;
        const idPlayer = storedData?.data?.idPlayer;

        // Check if token and idPlayer are available
        if (!token || !idPlayer) {
            console.error('Token or idPlayer missing in localStorage');
            return;
        }

        // Prepare the body data for the POST request
        const body = { idPlayer: idPlayer };

        // Make the POST request to the redeem URL
        const response = await fetch(redeemUrl, {
            method: 'POST',
            headers: {
                authorizationplayer: token,          // Authorization token from localStorage
                authorizationsite: '123456789abc',   // Replace with actual site key
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(body)
        });

        if (!response.ok) {
            console.error('Redeem API request failed');
            return;
        }

        const data = await response.json();
        console.log('Redeem Response:', data);

        // Check if the response was successful
        if (data.code !== 'ok') {
            console.error('Redeem request failed:', data.message || 'Unknown error');
            return;
        }

        // Get wallet amount from the response data
        const walletAmount = data.walletData?.redeemAmount;
        const currency = data.walletData?.codeCurrency;

        console.log(data.walletData);

        // If wallet amount is available, display it in the element with ID 'redeemableCoins'
        const redeemableCoinsElement = document.getElementById('redeemableCoins');
        if (redeemableCoinsElement && walletAmount !== undefined) {
            redeemableCoinsElement.textContent = `${currency} ${walletAmount}`;
        } else {
            console.error('Element with ID "redeemableCoins" not found or wallet amount is undefined');
        }

        // If successful, proceed to the next function
        return true;

    } catch (error) {
        console.error('Error during API call (Redeem):', error);
        return false;
    }
}


// Function to fetch player cashout history
async function getPlayerCashoutHistory() {
    try {
        // API URL for cashout history
        const cashoutHistoryUrl = 'https://spinvaultpreprod.sweepium.com:4010/PlayerRequestCashoutHistory';

        // Retrieve user data from localStorage
        const storedData = JSON.parse(localStorage.getItem('userData'));

        // Extract the token and idPlayer from storedData
        const token = storedData?.data?.token;
        const idPlayer = storedData?.data?.idPlayer;

        // Check if token and idPlayer are available
        if (!token || !idPlayer) {
            console.error('Token or idPlayer missing in localStorage');
            return;
        }

        // Define the request body for the POST request
        const body = {
            keySite: '123456789abc',    // Replace with actual site key
            token: token,
            idPlayer: idPlayer
        };

        // Make the POST request to the cashout history API
        const response = await fetch(cashoutHistoryUrl, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(body)
        });

        if (!response.ok) {
            console.error('Cashout API request failed');
            return;
        }

        const data = await response.json();
        const cashoutHistory = data.data;

        // Check if cashout history data is available
        if (!cashoutHistory || cashoutHistory.length === 0) {
            console.log('No cashout history available');
            return;
        }

        // Populate the table with the cashout history data
        const tableBody = document.getElementById('dataTableCashoutBody');
        tableBody.innerHTML = '';  // Clear any existing rows

        cashoutHistory.forEach((entry) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="dt-type-date">${entry.date}</td>
                <td class="dt-type-numeric">${entry.amount} $</td>
                <td>${entry.status}</td>
            `;
            tableBody.appendChild(row);
        });

        // Initialize the DataTable if it hasn't been initialized already
        if (!$.fn.DataTable.isDataTable('#dataTableCashout')) {
            $('#dataTableCashout').DataTable({
                paging: true,        // Enable pagination
                searching: true,     // Enable search functionality
                pageLength: 10,      // Default number of rows to show
                lengthMenu: [10, 20, 30],  // Dropdown options for rows per page
                order: [[0, 'desc']] // Order by date, descending
            });
        } else {
            // If DataTable is already initialized, redraw it to reflect new data
            $('#dataTableCashout').DataTable().clear().draw();
            $('#dataTableCashout').DataTable().rows.add($(tableBody).find('tr')).draw();
        }

    } catch (error) {
        console.error('Error during API call (Cashout):', error);
    }
}
// Main function to run both functions in sync
async function main() {
    // Run the setupRedeemable function first
    const redeemSuccess = await setupRedeemable();

    // If redeemable setup is successful, fetch cashout history
    if (redeemSuccess) {
        await getPlayerCashoutHistory();
    }
}

// Call the main function on document load
document.addEventListener('DOMContentLoaded', main);


</script>
<?php 
// Footer Section 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/footer.php"); 
?>
