<template>
    <div>
    <Navbar />
    <div class="container mx-auto" style="padding-top:2%;">
    <div class="bg-white rounded p-5">
    <table class="table-fixed">
    <thead>
        <tr>
        <th class="w-1/2 px-4 py-2">Title</th>
        <th class="w-1/4 px-4 py-2">Views</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td class="border px-4 py-2">Intro to CSS</td>
        <td class="border px-4 py-2">858</td>
        </tr>
        <tr>
        <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
        <td class="border px-4 py-2">112</td>
        </tr>
        <tr>
        <td class="border px-4 py-2">Chris</td>
        <td class="border px-4 py-2">1,280</td>
        </tr>
    </tbody>
    </table>
    </div>
    </div>   
    </div>
</template>

<script>
import Navbar from '../Layouts/Navbar';

export default {
    components: {
      Navbar,
    },
}
</script>
