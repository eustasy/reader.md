## Income Tax in the UK

### Tax-Free Allowance
Most people get a **tax-free allowance of £10,000**, but this changes if you were born before [6 April 1948](https://www.gov.uk/income-tax-rates/born-before-6-april-1948) OR your [income’s over £100,000](https://www.gov.uk/income-tax-rates/income-over-100000).

### Stacking Tax Brackets
| Taxable Income | **Income Tax Rate** |
|:---------------|--------------------:|
| First £31,865 | **20%** |
| From £31,865 to £150,000 | **40%** |
| Over £150,000 | **45%** |

### Calculator
Note: This is for the tax year 6 April 2014 to 5 April 2015.

<script>
function TaxBracket(income, bracket, tax) {
	if ( income > bracket ) {
		console.log(tax + '% tax on ' + ( income - bracket ) + ' for ' + bracket);
		return ( ( income - bracket ) * tax );
	} else {
		return 0;
	}
}
var income = 0;
var tax = 0;
function IncomeTaxCalculator() {

	console.log(document.getElementById('income').value);
	field = document.getElementById('income').value;

	// 2013-2014
	income = field;
	tax = 0;
	tax_bands = [];
	brackets = [];
	brackets.push(160000);
	brackets.push(41865);
	brackets.push(10000);
	tax_bands.push(45);
	tax_bands.push(40);
	tax_bands.push(20);
	var bracket_count = brackets.length;
	for (var i = 0; i < bracket_count; i++) {
		if ( income > brackets[i] ) {
			tax = tax + TaxBracket(income, brackets[i], tax_bands[i]);
			income = brackets[i];
		}
	}
	tax = tax / 100;
	console.log(tax);
	document.getElementById('js-target-tax').innerHTML = '£ ' + tax;

	// Proposed
	income = field;
	tax = 0;
	tax_bands = [];
	brackets = [];
	brackets.push(161000);
	brackets.push(42865);
	brackets.push(11000);
	tax_bands.push(45);
	tax_bands.push(40);
	tax_bands.push(20);
	var bracket_count = brackets.length;
	for (var i = 0; i < bracket_count; i++) {
		if ( income > brackets[i] ) {
			tax = tax + TaxBracket(income, brackets[i], tax_bands[i]);
			income = brackets[i];
		}
	}
	tax = tax / 100;
	console.log(tax);
	document.getElementById('js-target-new').innerHTML = '£ ' + tax;

}
</script>

£ <input id="income" type="number" onchange="IncomeTaxCalculator()"> <input type="submit">

Income Tax: <span id="js-target-tax"></span>

Proposed: <span id="js-target-new"></span>

### Notes

Savings interest is automatically taxed at 20%. If you’re on a low income, you may be able to get the [interest tax-free or get half of the tax repaid](https://www.gov.uk/apply-tax-free-interest-on-savings).

If you or your spouse or civil partner were born before 6 April 1935, you may be able to claim [Married Couple’s Allowance](https://www.gov.uk/married-couples-allowance) to reduce your tax bill.

If you’re blind, you may also be able to claim [Blind Person’s Allowance](https://www.gov.uk/blind-persons-allowance).
