// Store items and current selection
let orders = [];
let selectedOption = '';

function addItem(description, price) {
    const order = orders.find(item => item.description === description);
    if (order) {
        order.qty++;
        order.amount = order.qty * order.price;
    } else {
        orders.push({ qty: 1, description, price, amount: price });
    }
    renderOrders();
}

function renderOrders() {
    const orderList = document.getElementById('order-list');
    const totalAmount = document.getElementById('total-amount');
    orderList.innerHTML = '';
    let total = 0;
    orders.forEach(order => {
        const row = `<tr>
            <td>${order.qty}</td>
            <td>${order.description}</td>
            <td>${order.amount.toFixed(2)}</td>
        </tr>`;
        total += order.amount;
        orderList.innerHTML += row;
    });
    totalAmount.textContent = total.toFixed(2);
}

function toggleOption(option) {
    selectedOption = option;
    alert(`${option} selected.`);
}

function addSelected() {
    if (selectedOption) {
        addItem(selectedOption, 0);
    } else {
        alert('Please select an option first (Hot/Iced).');
    }
}

function removeSelected() {
    orders.pop();
    renderOrders();
}

function clearItems() {
    orders = [];
    renderOrders();
}

function printReceipt() {
    alert('Printing Receipt...');
}