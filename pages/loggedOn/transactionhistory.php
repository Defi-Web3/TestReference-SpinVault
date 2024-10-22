<?php
session_start();
// Start Loggedon Header 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
// End Loggedon Header 

// Start Loggedon Mobile Menu 
include_once($_SERVER['DOCUMENT_ROOT'] ."/commonComponents/mobileMenuLoggedon.php"); 
// End Loggedon Mobile Menu 
?>

<!-- main section -->
<main class="main-section logged-in transaction-history" role="container">
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
                    </div> -->
                    <!-- <div class="date date d-block d-md-flex">
                        <p class="text-white fw-bold m-0 me-2">Search by Date:</p>
                        <input type="text" id="entery-date" class="bg-transparent text-white border border-1 rounded-1 ps-1 py-1 my-2" value="2024/07/10">
                    </div> -->
                </div>
                <!--Enteries-->
                <p class="text-white fw-bold mb-2 text-center text-md-start">Entries</p>
                <table class="table-fixed w-full" id="walletTransactionsTable">
                    <thead>
                        <tr>
                         <td class="border border-white fw-bold text-white py-2 px-2 cursor-pointer">Date</td>
                         <td class="border border-white fw-bold text-white py-2 px-2 cursor-pointer">Credit</td>
                         <td class="border border-white fw-bold text-white p-2 px-2">Debit</td>
                         <td class="border border-white fw-bold text-white p-2 px-2">Note</td>
                        </tr>
                    </thead>
                <tbody id="dataTableBody">
                </tbody>
            </table>
                <!-- <table class="table-fixed w-full" id="walletTransactionsTable">
                    <tbody id="dataTableBody">
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>
</main> 
<script>
document.addEventListener("DOMContentLoaded", function () {
            const storedData = JSON.parse(localStorage.getItem('userData'));

            const token = storedData.data.token;
            const idPlayer = storedData.data.idPlayer;

            if (!token || !idPlayer) {
                console.error('Token or idPlayer is missing in localStorage.');
                return;
            }

            const url = `https://spinvaultpreprod.sweepium.com:4010/PlayerGetWalletTransactions?keySite=123456789abc&idPlayer=${idPlayer}&token=${token}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.result) {
                        const transactionHistory = data.data;

                        // Find the table body where data will be inserted
                        const dataTableBody = document.getElementById('dataTableBody');

                        // Clear any existing rows in the table body (except the headers)
                        dataTableBody.innerHTML = '';

                        // Use traditional for loop to iterate through each transaction
                        for (let i = 0; i < transactionHistory.length; i++) {
                            const transaction = transactionHistory[i];

                            const transactionDate = new Date(transaction.timestampWalletTransaction).toLocaleString(); // Format the date
                            const credit = transaction.nameWalletTransaction === 'Credit' ? `${transaction.amount} ${transaction.currencyCustomName}` : '-';
                            const debit = transaction.nameWalletTransaction === 'Debit' ? `${transaction.amount} ${transaction.currencyCustomName}` : '-';

                            // Create a new row with transaction data
                            const row = `
                                <tr class="cursor-pointer">
                                    <td class="border border-white text-white py-2 px-2">${transactionDate}</td>
                                    <td class="border border-white text-white py-2 px-2">${credit}</td>
                                    <td class="border border-white text-white py-2 px-2">${debit}</td>
                                    <td class="border border-white text-white py-2 px-2">${transaction.noteWalletTransaction}</td>
                                </tr>
                            `;

                            // Append the row to the table body
                            dataTableBody.innerHTML += row;
                        }

                        let table = new DataTable('#walletTransactionsTable');

                    } else {
                        console.error('Failed to load transactions:', data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching transactions:', error);
                });
        });
</script>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>



