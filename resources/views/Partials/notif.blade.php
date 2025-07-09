       @if (session('success') || session('error'))
           <div class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">
               <div class="flex space-x-8">
                   {{-- Success --}}
                   @if (session('success'))
                       <div class="bg-white p-6 rounded-xl shadow-lg text-center w-80">
                           <div class="flex justify-center mb-4">
                               <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                                   viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                               </svg>
                           </div>
                           <p class="text-xl font-bold text-green-600 mb-2">Peminjaman Berhasil!</p>
                           <p class="text-gray-600 mb-4">{{ session('success') }}</p>
                           <button onclick="this.parentElement.parentElement.parentElement.remove()"
                               class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">CLOSE</button>
                       </div>
                   @elseif ($errors->any())
                       <div class="bg-white p-6 rounded-xl shadow-lg text-center w-80">
                           <div class="flex justify-center mb-4">
                               <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                   viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                               </svg>
                           </div>
                           <<p class="text-xl font-bold text-red-600 mb-2">Peminjaman Gagal!</p>
                               <ul class="text-gray-600 mb-4 text-sm space-y-1 text-left">
                                   @foreach ($errors->all() as $error)
                                       <li>• {{ $error }}</li>
                                   @endforeach
                               </ul>
                               <button onclick="this.parentElement.parentElement.parentElement.remove()"
                                   class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">CLOSE</button>
                       </div>
                   @endif
               </div>
           </div>
       @endif

       <script>
           setTimeout(() => {
               document.querySelector('.fixed')?.remove();
           }, 4000); // 4 detik
       </script>
