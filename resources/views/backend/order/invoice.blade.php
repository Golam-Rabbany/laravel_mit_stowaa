@extends('master.dashboard_main')

@section('dashboard')
    
<section>
  <div class="mx-auto flex justify-between border-y border-gray-400 bg-gray-200 py-4">
    <ul>
      <li><img class="md:ml-12" height="50px" width="100px" src="https://about.gitlab.com/images/press/logo/preview/gitlab-logo-200-preview.png" alt="" /></li>
    </ul>
    <ul class="flex text-sky-700 sm:mr-2">
      <li class="mr-4 border-r-2 border-gray-100 pr-3">
        <a onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
        </svg></a>
      </li>
      <li>
        <ul>
          <li><span>Invoice </span><span class="text-red-500">#121212</span></li>
          <li><span>Date : </span><span class="text-red-500">22-8-2022</span></li>
        </ul>
      </li>
    </ul>
  </div>
</section>

<section class="mt-4">
  <div class="container mx-auto w-full">
    <div class="grid gap-2 text-center md:grid-cols-2">
      <div>
        <div class="text-dark block rounded bg-gray-200 py-1">Company Info</div>
        <ul class="md:ml-6">
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Jhigatola, Dhanmondi</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Zip Code</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> State, Country</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Phone: 111-111-111</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Paymant Info</span>
          </li>
        </ul>
      </div>

      <div>
        <div class="block rounded bg-gray-400 py-1 text-white">Customar Info</div>
        <ul class="md:ml-6">
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Jhigatola, Dhanmondi</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Zip Code</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> State, Country</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Phone: 111-111-111</span>
          </li>
          <li class="mt-1 flex">
            <span
              ><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg></span>
            <span> Paymant Info</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="mt-10">
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-left text-sm text-gray-500 ">
      <thead class="uppercase text-white bg-gray-400">
        <tr>
          <th class="py-3 px-6">Name</th>
          <th class="py-3 px-6">Photo</th>
          <th class="py-3 px-6">Quantity</th>
          <th class="py-3 px-6">Offer</th>
          <th class="py-3 px-6">Total Price</th>
        </tr>
      </thead>
      <tbody>
        <tr class="">
          <th scope="row" class="whitespace-nowrap py-4 px-6 font-medium">Apple MacBook Pro 17"</th>
          <td class="py-4 px-6">
            <img src="" alt="">
          </td>
          <td class="py-4 px-6">3</td>
          <td class="py-4 px-6">20%</td>
          <td class="py-4 px-6">$6323</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<div class="mt-3 mb-1 w-full bg-orange-500" style="height:1px"></div>
<div class="mb-3 w-full bg-green-500" style="height:1px"></div>

<section class="">
  <ul class="flex justify-between">
    <li></li>
    <li class="font-bold">
      <div class="mr-12"><span>Total Price </span>:<span class="text-red-500"> $1500</span></div>
    </li>
  </ul>
</section>

<section class="mt-10">
  <div class="rounded bg-gray-200 p-3 md:mx-6">
    <span>Thank you for choosing ~MMIT Soft Company~ <span class="opacity-0 sm:opacity-100">We believe you will be satisfied by our services.</span></span>
  </div>
</section>
@endsection