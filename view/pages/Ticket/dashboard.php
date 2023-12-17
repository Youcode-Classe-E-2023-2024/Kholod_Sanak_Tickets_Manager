
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body >

<div class="absolute bg-white p-8 rounded-md  w-fit right-0">
    <div class=" flex items-center justify-end pb-6">
        <div class="lg:ml-40 ml-10 space-x-8">
            <button class="bg-blue-500 hover:bg-blue-700  px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">New Ticket</button>
        </div>
    </div>
    <div>
        <div class="flex items-center justify-end">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto place-content-center">
                <div class="inline-block min-w-fit shadow rounded-lg overflow-hidden">
                    <table class="min-w-fit leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Ticket Number   </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tags
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex">
                                    <span> Assignees</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 30" id="filter_assignee"  fill="currentColor" aria-hidden="true" class="h-4 w-4"><path d="M20 36h8v-4h-8v4zM6 12v4h36v-4H6zm6 14h24v-4H12v4z"></path><path fill="none" d="M0 0h48v48H0z"></path></svg>
                                </div>

                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex">
                                    <span>Status</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 30" id="filter_status"  fill="currentColor" aria-hidden="true" class="h-4 w-4"><path d="M20 36h8v-4h-8v4zM6 12v4h36v-4H6zm6 14h24v-4H12v4z"></path><path fill="none" d="M0 0h48v48H0z"></path></svg>
                                </div>
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex">
                                    <span>Priority</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 30" id="filter_priority"  fill="currentColor" aria-hidden="true" class="h-4 w-4"><path d="M20 36h8v-4h-8v4zM6 12v4h36v-4H6zm6 14h24v-4H12v4z"></path><path fill="none" d="M0 0h48v48H0z"></path></svg>
                                </div>
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Due Date
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            1
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                <a href=ticket.php?id=" class="text-gray-900 hover:underline">
                                    <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                </a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                               <span
                                       class="relative inline-block px-3 py-1 font-semibold text-cyan-900	 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-cyan-200 opacity-50 rounded-full"></span>
									<span class="relative">Question</span>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    43
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
									<span class="relative">Done</span>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
									     <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-blue-500">
                                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 7h2v6h-2zm0 4h2v2h-2z"/>
                                            </svg>

                                            <span class="relative ml-2">Low</span>
                                         </div>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Jan 21, 2020
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="update" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="delete" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M24.2,12.193,23.8,24.3a3.988,3.988,0,0,1-4,3.857H12.2a3.988,3.988,0,0,1-4-3.853L7.8,12.193a1,1,0,0,1,2-.066l.4,12.11a2,2,0,0,0,2,1.923h7.6a2,2,0,0,0,2-1.927l.4-12.106a1,1,0,0,1,2,.066Zm1.323-4.029a1,1,0,0,1-1,1H7.478a1,1,0,0,1,0-2h3.1a1.276,1.276,0,0,0,1.273-1.148,2.991,2.991,0,0,1,2.984-2.694h2.33a2.991,2.991,0,0,1,2.984,2.694,1.276,1.276,0,0,0,1.273,1.148h3.1A1,1,0,0,1,25.522,8.164Zm-11.936-1h4.828a3.3,3.3,0,0,1-.255-.944,1,1,0,0,0-.994-.9h-2.33a1,1,0,0,0-.994.9A3.3,3.3,0,0,1,13.586,7.164Zm1.007,15.151V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Zm4.814,0V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Z"></path></svg>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            2  </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                <a href="a" class="text-gray-900 hover:underline">
                                    <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                </a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <span
                                         class="relative inline-block px-3 py-1 font-semibold text-cyan-900	 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-cyan-200 opacity-50 rounded-full"></span>
									<span class="relative">Bug</span>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    64
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                   <span
                                       class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>

									<span class="relative">In Progress</span>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                   <span
                                       class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                       <div class="flex">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-yellow-500">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 7h2v6h-2zm0 4h2v2h-2z"/>
                                        </svg>
                                        <span class="relative ml-2">Medium</span>
                                            </div>
									</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Jan 21, 2020
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="update" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="delete" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M24.2,12.193,23.8,24.3a3.988,3.988,0,0,1-4,3.857H12.2a3.988,3.988,0,0,1-4-3.853L7.8,12.193a1,1,0,0,1,2-.066l.4,12.11a2,2,0,0,0,2,1.923h7.6a2,2,0,0,0,2-1.927l.4-12.106a1,1,0,0,1,2,.066Zm1.323-4.029a1,1,0,0,1-1,1H7.478a1,1,0,0,1,0-2h3.1a1.276,1.276,0,0,0,1.273-1.148,2.991,2.991,0,0,1,2.984-2.694h2.33a2.991,2.991,0,0,1,2.984,2.694,1.276,1.276,0,0,0,1.273,1.148h3.1A1,1,0,0,1,25.522,8.164Zm-11.936-1h4.828a3.3,3.3,0,0,1-.255-.944,1,1,0,0,0-.994-.9h-2.33a1,1,0,0,0-.994.9A3.3,3.3,0,0,1,13.586,7.164Zm1.007,15.151V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Zm4.814,0V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Z"></path></svg>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 bg-white text-sm">
                                <div class="flex items-center">

                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            3  </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                <a href="a" class="text-gray-900 hover:underline">
                                    <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                </a>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                 <span
                                         class="relative inline-block px-3 py-1 font-semibold text-cyan-900	 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-cyan-200 opacity-50 rounded-full"></span>
									<span class="relative">Invalid</span>
									</span>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">70</p>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
									<span class="relative">TO DO</span>
									</span>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
									    <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-red-900">
                                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 7h2v6h-2zm0 4h2v2h-2z"/>
                                           </svg>
                                        <span class="relative ml-2"> High</span>
                                        </div>

									</span>
                            </td>
                            <td class="px-5 py-5 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Jan 18, 2020</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="update" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="delete" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M24.2,12.193,23.8,24.3a3.988,3.988,0,0,1-4,3.857H12.2a3.988,3.988,0,0,1-4-3.853L7.8,12.193a1,1,0,0,1,2-.066l.4,12.11a2,2,0,0,0,2,1.923h7.6a2,2,0,0,0,2-1.927l.4-12.106a1,1,0,0,1,2,.066Zm1.323-4.029a1,1,0,0,1-1,1H7.478a1,1,0,0,1,0-2h3.1a1.276,1.276,0,0,0,1.273-1.148,2.991,2.991,0,0,1,2.984-2.694h2.33a2.991,2.991,0,0,1,2.984,2.694,1.276,1.276,0,0,0,1.273,1.148h3.1A1,1,0,0,1,25.522,8.164Zm-11.936-1h4.828a3.3,3.3,0,0,1-.255-.944,1,1,0,0,0-.994-.9h-2.33a1,1,0,0,0-.994.9A3.3,3.3,0,0,1,13.586,7.164Zm1.007,15.151V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Zm4.814,0V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Z"></path></svg>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
						<span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                class="text-sm text-indigo-50 transition duration-150 bg-blue-500 hover:bg-blue-700 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            &nbsp; &nbsp;
                            <button
                                class="text-sm text-indigo-50 transition duration-150 bg-blue-500 hover:bg-blue-700  font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
