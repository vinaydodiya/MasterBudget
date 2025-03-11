document.getElementById('taxForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const income = parseFloat(document.getElementById('income').value);
    const taxPayable = calculateTax(income);
    const suggestions = getTaxSavingSuggestions(income);

    document.getElementById('taxableIncome').textContent = income.toLocaleString();
    document.getElementById('taxPayable').textContent = taxPayable.toLocaleString();
    
    const suggestionsList = document.getElementById('suggestions');
    suggestionsList.innerHTML = '';
    suggestions.forEach(suggestion => {
        const li = document.createElement('li');
        li.textContent = suggestion;
        suggestionsList.appendChild(li);
    });

    document.getElementById('result').classList.remove('hidden');
});

function calculateTax(income) {
    let tax = 0;

    if (income <= 250000) {
        tax = 0;
    } else if (income <= 500000) {
        tax = (income - 250000) * 0.05;
    } else if (income <= 1000000) {
        tax = 12500 + (income - 500000) * 0.2;
    } else {
        tax = 112500 + (income - 1000000) * 0.3;
    }

    return tax;
}

function getTaxSavingSuggestions(income) {
    const suggestions = [];

    if (income > 500000) {
        suggestions.push("Invest in ELSS (Equity Linked Savings Scheme) under Section 80C.");
        suggestions.push("Contribute to NPS (National Pension System) under Section 80CCD(1B).");
        suggestions.push("Purchase health insurance under Section 80D.");
    }

    if (income > 1000000) {
        suggestions.push("Consider investing in tax-free bonds.");
        suggestions.push("Donate to charitable institutions under Section 80G.");
    }

    if (income <= 500000) {
        suggestions.push("Utilize the full limit of Section 80C (1.5 lakh) for tax savings.");
    }

    return suggestions;
}