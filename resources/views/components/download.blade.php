<div>
    <form method="POST" action="{{  route('resume.download') }}">
        @csrf
        <button>
            Download PDF
        </button>
    </form>
</div>