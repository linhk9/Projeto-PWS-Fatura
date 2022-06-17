<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            fatura+
                        </td>

                        <td>
                            Invoice #: 123<br />
                            Created: January 1, 2015<br />
                            Due: February 1, 2015
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Sparksuite, Inc.<br />
                            12345 Sunny Road<br />
                            Sunnyville, TX 12345
                        </td>

                        <td>
                            Acme Corp.<br />
                            John Doe<br />
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>Item</td>

            <td>Price</td>
        </tr>

        <?php  if (isset($faturas)){
            foreach ($faturas as $fatura) {
                <tr class="item">
                    <td><?php echo $fatura-></td>

                    <td>$75.00</td>
                </tr>
            }
        }
        ?>

        <tr class="item">
            <td>Hosting (3 months)</td>

            <td>$75.00</td>
        </tr>

        <tr class="item last">
            <td>Domain name (1 year)</td>

            <td>$10.00</td>
        </tr>

        <tr class="total">
            <td></td>

            <td>Total: $385.00</td>
        </tr>
    </table>
</div>