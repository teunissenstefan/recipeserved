@extends("layouts.main")
@section("content")
    <h2>Formatting help</h2>
    <table>
        <thead>
        <tr>
            <th>Formatting</th>
            <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>[ul][li]Butter[/li][li]Chocolate[/li][/ul]</td>
            <td>{!! displayWithFormatting("[ul][li]Butter[/li][li]Chocolate[/li][/ul]") !!}</td>
        </tr>
        <tr>
            <td>[ol][li]Butter[/li][li]Chocolate[/li][/ol]</td>
            <td>{!! displayWithFormatting("[ol][li]Butter[/li][li]Chocolate[/li][/ol]") !!}</td>
        </tr>
        <tr>
            <td>[b]Bold[/b]</td>
            <td>{!! displayWithFormatting("[b]Bold[/b]") !!}</td>
        </tr>
        <tr>
            <td>[strong]Strong[/strong]</td>
            <td>{!! displayWithFormatting("[strong]Strong[/strong]") !!}</td>
        </tr>
        <tr>
            <td>[i]Italic[/i]</td>
            <td>{!! displayWithFormatting("[i]Italic[/i]") !!}</td>
        </tr>
        <tr>
            <td>[em]Emphasis[/em]</td>
            <td>{!! displayWithFormatting("[em]Emphasis[/em]") !!}</td>
        </tr>
        <tr>
            <td>[p]Paragraph[/p]</td>
            <td>{!! displayWithFormatting("[p]Paragraph[/p]") !!}</td>
        </tr>
        <tr>
            <td>[small]Small[/small]</td>
            <td>{!! displayWithFormatting("[small]Small[/small]") !!}</td>
        </tr>
        </tbody>
    </table>
@endsection
