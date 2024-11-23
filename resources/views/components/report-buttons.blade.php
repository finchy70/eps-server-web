<a href="{{route('pdfs.pdf_checklist', $inspection->id)}}" class="py-1 text-xs md:text-sm px-2 flex ml-auto items-center justify-center btn-indigo">
    Download Checklist PDF
</a>
<a href="{{route('pdfs.pdf_tables', $inspection->id)}}" class="py-1 text-xs md:text-sm px-2 flex ml-2 items-center justify-center btn-yellow">
    Download Tables
</a>
<a href="{{route('inspections')}}" class="py-1 text-xs md:text-sm px-2 flex ml-2 items-center justify-center btn-teal">
    Back
</a>

