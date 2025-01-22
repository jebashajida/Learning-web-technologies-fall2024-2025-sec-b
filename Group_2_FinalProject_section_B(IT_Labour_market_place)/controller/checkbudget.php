<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    session_start();
    if (!isset($_SESSION['budget'])) {
        $_SESSION['budget'] = [
            'total_budget' => 0,
            'expenses' => []
        ];
    }

    if ($action === 'setBudget') {
        $totalBudget = floatval($_POST['total_budget']);
        $_SESSION['budget']['total_budget'] = $totalBudget;
        echo json_encode(["message" => "Budget set successfully!", "data" => $_SESSION['budget']]);
    } elseif ($action === 'addExpense') {
        $expenseName = $_POST['expense_name'];
        $expenseAmount = floatval($_POST['expense_amount']);
        $_SESSION['budget']['expenses'][] = ['name' => $expenseName, 'amount' => $expenseAmount];
        echo json_encode(["message" => "Expense added successfully!", "data" => $_SESSION['budget']]);
    } elseif ($action === 'getBudget') {
        echo json_encode($_SESSION['budget']);
    } elseif ($action === 'clearBudget') {
        $_SESSION['budget'] = [
            'total_budget' => 0,
            'expenses' => []
        ];
        echo json_encode(["message" => "Budget data cleared successfully!", "data" => $_SESSION['budget']]);
    }
    exit;
}
