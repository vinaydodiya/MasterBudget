// script.js

function calculateTax() {
    const income = parseFloat(document.getElementById('income').value);
    const country = document.getElementById('country').value;

    if (isNaN(income) || income <= 0) {
        alert("Please enter a valid income!");
        return;
    }

    let tax = 0;
    let suggestions = [];

    // USA Tax Slabs (simplified for the sake of example)
    if (country === 'USA') {
        // Assuming 2023 tax brackets for individual taxpayers (for simplicity)
        if (income <= 9950) {
            tax = income * 0.1;
        } else if (income <= 40525) {
            tax = 995 + (income - 9950) * 0.12;
        } else if (income <= 86375) {
            tax = 4664 + (income - 40525) * 0.22;
        } else {
            tax = 14751 + (income - 86375) * 0.24;
        }

        suggestions.push("1. Contribute to a **401(k)** or **IRA** for tax deferral.");
        suggestions.push("2. Deduct **healthcare expenses** (HSA or FSA).");
        suggestions.push("3. Donate to charity for a **tax deduction**.");
    }
    
    // UK Tax Slabs (simplified for the sake of example)
    else if (country === 'UK') {
        if (income <= 12570) {
            tax = 0;
        } else if (income <= 50270) {
            tax = (income - 12570) * 0.2;
        } else if (income <= 150000) {
            tax = (income - 50270) * 0.4 + 7540;
        } else {
            tax = (income - 150000) * 0.45 + 45440;
        }

        suggestions.push("1. Contribute to a **pension scheme** for tax savings.");
        suggestions.push("2. Invest in **ISAs** (Individual Savings Accounts) for tax-free growth.");
        suggestions.push("3. Consider making **charitable donations** for tax relief.");
    }

    // India Tax Slabs (simplified for the sake of example)
    else if (country === 'India') {
        if (income <= 250000) {
            tax = 0;
        } else if (income <= 500000) {
            tax = (income - 250000) * 0.05;
        } else if (income <= 1000000) {
            tax = (income - 500000) * 0.1 + 12500;
        } else {
            tax = (income - 1000000) * 0.15 + 125000;
        }

        suggestions.push("1. Invest in **PPF** (Public Provident Fund) under **Section 80C**.");
        suggestions.push("2. Contribute to **NPS** (National Pension Scheme) for additional deductions.");
        suggestions.push("3. Consider **health insurance** premiums under **Section 80D**.");
    }

    // Canada Tax Slabs (simplified for the sake of example)
    else if (country === 'Canada') {
        if (income <= 47630) {
            tax = income * 0.15;
        } else if (income <= 95259) {
            tax = 7144 + (income - 47630) * 0.205;
        } else {
            tax = 14151 + (income - 95259) * 0.26;
        }

        suggestions.push("1. Contribute to a **RRSP** (Registered Retirement Savings Plan).");
        suggestions.push("2. Claim **medical expenses** for tax relief.");
        suggestions.push("3. Make **charitable donations** for tax deductions.");
    }

    // Australia Tax Slabs (simplified for the sake of example)
    else if (country === 'Australia') {
        if (income <= 18200) {
            tax = 0;
        } else if (income <= 45000) {
            tax = (income - 18200) * 0.19;
        } else if (income <= 120000) {
            tax = (income - 45000) * 0.325 + 3570;
        } else {
            tax = (income - 120000) * 0.37 + 28780;
        }

        suggestions.push("1. Contribute to a **Superannuation Fund** for tax benefits.");
        suggestions.push("2. Claim deductions for **work-related expenses**.");
        suggestions.push("3. Consider **charitable donations** for tax benefits.");
    }

    // Display results
    document.getElementById('results').style.display = 'block';
    document.getElementById('suggestions').innerHTML = suggestions.join("<br>");
    document.getElementById('taxDetails').innerHTML = `<strong>Total Tax: ${tax.toFixed(2)} USD (or equivalent)</strong>`;
}
