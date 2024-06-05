<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
   {{-- <x-application-logo class="block h-12 w-auto" />--}}
    <h2 class="mt-8 text-2xl font-medium text-gray-900">
        Dashboard
    </h2>
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Where can I get some?
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        There are many variations of passages of Lorem Ipsum available,
        but the majority have suffered alteration in some form,
        by injected humour, or randomised words which don't look
        even slightly believable. If you are going to use a passage
        of Lorem Ipsum, you need to be sure there isn't anything
        embarrassing hidden in the middle of text.
    </p>
</div>

<div class="container">
    <div class="row d-flex">
        <div class="col-md-8">
            <table class="dashbord-data">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Package Name</th>
                    <th>Tokens</th>
                    <th>Subscription Date</th>
                    <th>Expiray Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td data-label="Name">{{ $item->user_id }}</td>
                        <td class="px-6 py-4">
                            @if ($item->plan_id == 1)
                                Basic
                            @elseif ($item->plan_id == 2)
                                Standard
                            @else ($item->plan_id == 3)
                                Premium
                            @endif
                        </td>
                        <td data-label="Tokens">{{ $item->credit_buy }}</td>
                        <td data-label="Subscription Date">{{ $item->created_at }}</td>
                        <td data-label="Expiry Date">{{ $item->expiry_date }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="tbl-btm" colspan="3" data-label="Column 1">Remaining Tokens</td>
                    <td class="tbl-btm" colspan="2" data-label="Column 2">{{ $token }}</td>

                </tr>

                </tbody>
                {{ $data->links() }}
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                    </svg>
                    <h2>
                        <a href="/payment">Select Plan</a>
                    </h2>
                </div>

                <p>Start with only 9.99$</p>

                <p>
                    <a href="/payment">
                        Click here to see packages
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </p>
            </div>
            <div class="card">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"></path>
                    </svg>
                    <h2>
                        <a href="#">Lorem Ipsum</a>
                    </h2>
                </div>

                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                <p>
                    <a href="#">
                        Start watching Cake Pixel
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
