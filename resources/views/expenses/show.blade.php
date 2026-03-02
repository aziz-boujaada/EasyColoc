<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Expense Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" min-h-screen flex  text-white">
@include('components.dashboard-side-bar')
    <div class="bg-white text-black p-24 rounded-lg shadow w-[90%] ">

        <h1 class="text-3xl font-bold mb-6 text-green-800">{{ $expense->title }}</h1>

        <div class="space-y-2 mb-6">
            <p><strong>Amount:</strong> {{ $expense->amount }} MAD</p>
            <p><strong>Date:</strong> {{ $expense->expense_date }}</p>
            <p><strong>Colocation:</strong> {{ $expense->colocation->name }}</p>
            <p><strong>Payer:</strong> {{ $expense->payer->name }}</p>
            <p><strong>Category:</strong> {{ $expense->category->name }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-4 text-green-800">Payments</h2>

       <div class="bg-gray-100 p-4 rounded">
    @foreach($expense->payments as $payment)
        <div class="mb-2">
            {{ $payment->from_user->name }} → {{ $payment->to_user->name }} : {{ $payment->amount }} MAD
            @if($payment->paid_at)
                <span class="text-green-700 font-semibold">(Paid)</span>
            @else
                <span class="text-red-600 font-semibold">(Unpaid)</span>
                <form action="{{ route('payments.markPaid', $payment) }}" method="post" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">
                        Mark as Paid
                    </button>
                </form>
            @endif
        </div>
    @endforeach
</div>

    </div>

</body>

</html>