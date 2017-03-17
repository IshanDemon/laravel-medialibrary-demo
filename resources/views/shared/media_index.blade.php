<h1>{{ ucfirst($model) }} media</h1>

@include('partials.status')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">All media files</h3>
    </div>

    @if($media->isEmpty())
        <div class="panel-body">
            No media added yet.
        </div>
    @endif

    <div class="list-group">
        @foreach($media as $file)
            <div class="list-group-item">
                <div class="media">
                    <div class="media-left">
                        @if(starts_with($file->mime_type, 'image'))
                            <a href="{{ $file->getUrl() }}" target="_blank">
                                <img class="media-object" src="{{ $file->getUrl() }}" alt="{{ $file->name }}">
                            </a>
                        @else
                            <span class="glyphicon glyphicon-file large-icon"></span>
                        @endif
                    </div>
                    <div class="media-body">
                        <div class="btn-group pull-right">
                            <a href="{{ route("{$model}.media.destroy", $file->id) }}"
                               data-method="delete"
                               data-token="{{ csrf_token() }}"
                               class="close">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </div>
                        <h4 class="media-heading">{{ $file->name }}</h4>
                        <p>
                            <code>
                                {{ $file->getPath() }}<br/>
                            </code>
                            <small>
                                {{ $file->human_readable_size }} |
                                {{ $file->mime_type }}
                            </small>
                        </p>

                        @foreach($file->getMediaConversionNames() as $conversion)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{ $file->getUrl($conversion) }}" target="_blank">
                                        <img class="media-object media-object-small"
                                             src="{{ $file->getUrl($conversion) }}" alt="{{ $conversion }}">
                                    </a>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">{{ $conversion }}</h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="panel-footer">
        <a href="{{ route("{$model}.media.destroy_all") }}"
           class="btn btn-sm btn-danger"
           data-method="delete"
           data-confirm="Are you sure you wish to delete all media?"
           data-token="{{ csrf_token() }}">
            Delete all
        </a>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Upload media files</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route("{$model}.media.store") }}"
              class="dropzone"
              id="media-dropzone">

            {{ csrf_field() }}

        </form>
    </div>
</div>
