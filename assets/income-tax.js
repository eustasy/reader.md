function TaxBracket(income, bracket, tax) {
	if ( income > bracket ) {
		console.log(tax + '% tax on ' + ( income - bracket ) + ' for ' + bracket)
		return ( ( income - bracket ) * tax )
	} else {
		return 0
	}
}
var income = 0
var tax = 0
function IncomeTaxCalculator() {

	console.log(document.getElementById('income').value)
	field = document.getElementById('income').value

	income = field
	tax = 0
	tax_bands = []
	brackets = []
	brackets.push(150000)
	brackets.push(45000)
	brackets.push(11500)
	tax_bands.push(45)
	tax_bands.push(40)
	tax_bands.push(20)
	var bracket_count = brackets.length
	for (var i = 0; i < bracket_count; i++) {
		if ( income > brackets[i] ) {
			tax = tax + TaxBracket(income, brackets[i], tax_bands[i])
			income = brackets[i]
		}
	}
	if ( field > 100000 ) {
		overhold = field - 100000
		overhold = overhold / 2
		// Tax the pervious personal allowance at the normal rate.
		if ( overhold > 11500 ) {
			console.log('20% tax on ' + 11500)
			tax = tax + ( 11500 * 20 )
		} else {
			console.log('20% tax on ' + overhold)
			tax = tax + ( overhold * 20 )
		}
	}
	tax = tax / 100
	document.getElementById('js-target-tax').innerHTML = '£ ' + tax

	// Proposed
	income = field
	tax = 0
	tax_bands = []
	brackets = []
	brackets.push(123000)
	brackets.push(80000)
	brackets.push(45000)
	brackets.push(11500)
	tax_bands.push(50)
	tax_bands.push(45)
	tax_bands.push(40)
	tax_bands.push(20)
	var bracket_count = brackets.length
	for (var i = 0; i < bracket_count; i++) {
		if ( income > brackets[i] ) {
			tax = tax + TaxBracket(income, brackets[i], tax_bands[i])
			income = brackets[i]
		}
	}
	if ( field > 100000 ) {
		overhold = field - 100000
		overhold = overhold / 2
		// Tax the pervious personal allowance at the normal rate.
		if ( overhold > 11500 ) {
			console.log('20% tax on ' + 11500)
			tax = tax + ( 11500 * 20 )
		} else {
			console.log('20% tax on ' + overhold)
			tax = tax + ( overhold * 20 )
		}
	}
	tax = tax / 100
	document.getElementById('js-target-new').innerHTML = '£ ' + tax

}
