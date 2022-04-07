@component('mail::message')
<div>
    <strong>სახელი და გვარი:</strong> {{ $name }}
    <br>
    <strong>საკონტაქტო ინფორმაცია:</strong> {{ $contact }}
    <br>
    <strong>როდის ჩამოფრინდა:</strong> {{ \Carbon\Carbon::parse($arrive)->format('d M, Y') }}
    <br>
    <strong>როდის მიფრინავს:</strong> {{ \Carbon\Carbon::parse($departure)->format('d M, Y') }}
    <br>
    <strong>სად იმყოფება ამჟამად:</strong> {{ $location }}
    @if($comment)
    <br>
    <strong>დამატებითი ინფორმაცია:</strong> {{ $comment }}
    @endif
</div>
<br>
<div>
    <strong>ატვირთული დოკუმენტაცია:</strong>
    <div>
        <a href="{{ config('app.url') . '/storage/' . $passport }}" download>
            <strong>პასპორტი</strong>
        </a>
        <br>
        <a href="{{ config('app.url') . '/storage/' . $passport_arrival }}" download>
            <strong>პასპორტი ჩამოსვლის თარიღით</strong>
        </a>
    </div>
</div>
@endcomponent