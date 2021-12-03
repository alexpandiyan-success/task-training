<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 20px;">
                <h1> Todo app </h1>

                  <table>
                      <tr>
                          <td>S.no</td>
                          <td>Task</td>

                      </tr>
                      @foreach($tasks as $task)
                      <tr>

                          <td>*</td>
                          
                         <td>{{ ($task->task_name) }}</td>
                      </tr>
                      @endforeach

                  </table>

                
                </div>
            </div>
            
            </div>
        </div>
    </div>
</x-app-layout>
