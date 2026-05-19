<div class="modal-overlay" id="transactionModal">

    <div class="modal-box">

        <!-- HEADER -->
        <div class="modal-header">

            <h2>Add Transaction</h2>

            <button id="closeModal" class="close-btn">
                ✕
            </button>

        </div>

        <!-- FORM -->
        <form class="transaction-form">

            <!-- TYPE -->
            <div class="form-group">

                <label>Transaction Type</label>

                <div class="type-selector">

                    <button 
                        type="button"
                        class="type-btn expense active"
                    >
                        ↗ Expense
                    </button>

                    <button 
                        type="button"
                        class="type-btn income"
                    >
                        ↙ Income
                    </button>

                </div>

            </div>

            <!-- AMOUNT -->
            <div class="form-group">

                <label>Amount</label>

                <div class="input-icon">

                    <span>Rp</span>

                    <input 
                        type="number"
                        placeholder="0"
                    >

                </div>

            </div>

            <!-- CATEGORY + DATE -->
            <div class="form-row">

                <div class="form-group">

                    <label>Category</label>

                    <select>

                        <option>Food</option>
                        <option>Transport</option>
                        <option>Shopping</option>
                        <option>Salary</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Date</label>

                    <input type="date">

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">

                <label>Description</label>

                <textarea 
                    placeholder="What was this transaction for?"
                ></textarea>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">

                <button 
                    type="button"
                    class="cancel-btn"
                    id="cancelModal"
                >
                    Cancel
                </button>

                <button 
                    type="submit"
                    class="submit-btn"
                >
                    Save Transaction
                </button>

            </div>

        </form>

    </div>

</div>