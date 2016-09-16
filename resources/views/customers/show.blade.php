@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>
    <div>
        <hr>
        <h1>Stocks</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($stocks as $stock)
            <tr>
                <td>{{ $stock->symbol }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->shares }}</td>
                <td>{{ $stock->purchase_price }}</td>
                <td>{{ $stock->purchased }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    <div>
        <hr>
        <h1>Investments</h1>
        <table class="table table-striped table-bordered table-hover">
            <thread>
            <tr class="bg-info">
                <th>Cust No</th>
                <th>Cust Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thread>
            <tbody>
            @foreach($investments as $investment)
                <tr>
                    <td>{{$investment->customer->cust_number }}</td>
                    <td>{{$investment->customer->name }}</td>
                    <td>{{$investment->category}}</td>
                    <td>{{$investment->description}}</td>
                    <td>{{$investment->Acquired_Value}}</td>
                    <td>{{$investment->Acquired_Date}}</td>
                    <td>{{$investment->Recent_Value}}</td>
                    <td>{{$investment->Recent_Date}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop
