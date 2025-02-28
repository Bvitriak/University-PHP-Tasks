let lastInputWasOperator = false; 

function appendNumber(value) {
    const display = document.getElementById('display');
    if (display.value === "Ошибка" || display.value === "undefined") {
        display.value = "";
    }
    if (lastInputWasOperator) {
        display.value += " " + value; 
        lastInputWasOperator = false;
    } else {
        display.value += value;
    }
}

function appendOperator(operator) {
    const display = document.getElementById('display');
    if (display.value === "Ошибка" || display.value === "undefined") {
        display.value = "";
    }
    if (!lastInputWasOperator) {
        display.value += " " + operator + " "; 
        lastInputWasOperator = true;
    }
}

function toggleSign() {
    const display = document.getElementById('display');
    let currentValue = display.value.trim(); 

    if (currentValue === "" || currentValue === "Ошибка" || currentValue === "undefined") {
        return;
    }

    const parts = currentValue.split(/([+\-*/])/g).filter(part => part.trim() !== "");
    const lastPart = parts[parts.length - 1]; 

    if (!isNaN(lastPart)) {
        if (lastPart.startsWith("-")) {
            parts[parts.length - 1] = lastPart.slice(1); 
        } else {
            parts[parts.length - 1] = "-" + lastPart; 
        }
        display.value = parts.join(" "); 
    }
}

function calculatePercentage() {
    const display = document.getElementById('display');
    let currentValue = display.value.trim(); 

    if (currentValue === "" || currentValue === "Ошибка" || currentValue === "undefined") {
        return;
    }

    const parts = currentValue.split(/([+\-*/])/g).filter(part => part.trim() !== "");
    const lastPart = parts[parts.length - 1]; 
    if (!isNaN(lastPart)) {
        const percentage = parseFloat(lastPart) / 100;

        if (parts.length > 1) {
            const operator = parts[parts.length - 2].trim();
            const previousNumber = parseFloat(parts[parts.length - 3]);

            let result;
            switch (operator) {
                case '+':
                case '-':
                    result = previousNumber * percentage;
                    break;
                case '*':
                case '/':
                    result = percentage;
                    break;
                default:
                    result = percentage;
            }

            parts[parts.length - 1] = result.toString();
            display.value = parts.join(" ");
        } else {
            display.value = percentage.toString();
        }
    }
}

function clearDisplay() {
    document.getElementById('display').value = '';
    lastInputWasOperator = false;
}

function calculate() {
    const display = document.getElementById('display');
    try {
        const result = eval(display.value.replace(/ /g, '')); 
        if (result === undefined || isNaN(result)) {
            display.value = "Ошибка";
        } else {
            display.value = result;
        }
    } catch (e) {
        display.value = "Ошибка";
    }
    lastInputWasOperator = false;
}