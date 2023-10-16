let seoScore = $("#seoScore");
let score = {
    empty_desc: 0,
    empty_tag: 0,
    k_count: 0,
    k_title: 0,
    st_title: 0,
    t_count: 0,
    k_para: 0,
    desc_count: 0,
    desc_link: 0,
    desc_k_time: 0,
    tag_count: 0,
    st_tag: 0,
    k_tag: 0,
};

function updateScore() {
    var total = 0;
    var array = array_values(score);
    for(var i=0;i<array.length;i++) {
        if(isNaN(array[i])) {
            continue;
        }
        total += Number(array[i]);
    }
    seoScore.val(total);
}

function array_values(input) {
    var tmpArr = [];
    var key = '';

    for (key in input) {
        tmpArr[tmpArr.length] = input[key]
    }

    return tmpArr
}

function onVideoChange(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.post-preview .videoPreview').html(
                `<video id="video" controls width="100%">` +
                `<source class="video_source" src="#">` +
                `</video>`
            ).fadeIn();
            $('.post-preview  video source').attr('src', e.target.result);
            $('.post-preview  video')[0].load();
            $('#video_string').val(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function wordCount(str, separator=null) {
    if(separator != null && separator === ',')
        return str.split(',').length;
    else
        return str.split(' ').length;
}

function charCount(str) {
    return str.length;
}

function textContains(text,str,start=null) {
    if(start != null)
        return text.includes(str, start);
    else
        return text.includes(str);
}

function startWith(text,str) {
    return text.startsWith(str);
}

function twiceKeyword(text,str) {
    return [...text.matchAll(str)].length;
}

function keyword_seo_empty(input) {
    var text = $(input).val();

    if(text === "") {
        $('.keyword_empty').html(`<i class="feather icon-x bg-danger btn-circle text-white"></i> You haven't set your focus keyword.`);
    } else {
        $('.keyword_empty').html(``)
    }
}

function keyword_seo_words(input) {
    var text = $(input).val();

    if (text !== "") {
        if(wordCount(text) > 0 && wordCount(text) < 2) {
            score.k_count = 0;
            $('.keyword_words').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your focus keyword should be at least 2 words.`);
        } else {
            score.k_count = 2;
            $('.keyword_words').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Yay! Your focus keyword contains at least 2 words.`);
        }
    } else {
        score.k_count = 0;
        $('.keyword_words').html(``);
    }
    updateScore()
}

function title_seo_empty(input) {
    var text = $(input).val();

    if(text === "") {
        $('.title_empty').html(`<i class="feather icon-x bg-danger btn-circle text-white"></i> Bad! Your video title is empty.`);
    } else {
        $('.title_empty').html(``)
    }
}

function title_seo_words(input) {
    var text = $(input).val();

    if (text !== "") {
        if(wordCount(text) > 0 && wordCount(text) < 5) {
            score.t_count = 0;
            $('.title_words').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your video title should be at least 5 words.`);
        } else {
            score.t_count = 8;
            $('.title_words').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! The title has good length.`);
        }
    } else {
        score.t_count = 0;
        $('.title_words').html(``);
    }
    updateScore()
}

function description_seo_empty(input) {
    var text = $(input).val();

    if (text !== "") {
        if(text === "") {
            score.empty_desc = 0;
            $('.description_empty').html(`<i class="feather icon-x bg-danger btn-circle text-white"></i> Bad! Your video description is empty.`);
        } else {
            score.empty_desc = 1;
            $('.description_empty').html(``)
        }
    } else {
        score.empty_desc = 0;
        $('.description_empty').html(``);
    }
    updateScore()
}

function description_seo_words(input) {
    var text = $(input).val();

    if (text !== "") {
        if(wordCount(text) > 0 && wordCount(text) <= 250) {
            score.desc_count = 0;
            $('.description_words').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! The description have less than 250 words.`);
        } else {
            score.desc_count = 12;
            $('.description_words').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Great! You put a lot of effort into your video description.`);
        }
    } else {
        score.desc_count = 0;
        $('.description_words').html(``);
    }
    updateScore()
}

function seo_description_has_link(text) {
    if (text !== "") {
        if( new RegExp(
            "([a-zA-Z0-9]+://)?([a-zA-Z0-9_]+:[a-zA-Z0-9_]+@)?([a-zA-Z0-9.-]+\\.[A-Za-z]{2,4})(:[0-9]+)?(/.*)?"
        ).test(text))
        {
            score.desc_link = 8;
            $('.description_link').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! Your video description has outbound link.`);
        } else {
            score.desc_link = 0;
            $('.description_link').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your video description dont have outbound link.`);
        }
    } else {
        score.desc_link = 0;
        $('.description_link').html(``);
    }
    updateScore()
}

function tags_seo_empty(input) {
    var text = $(input).val();

    if(text === "") {
        score.empty_tag = 0;
        $('.tag_empty').html(`<i class="feather icon-x bg-danger btn-circle text-white"></i> Bad! Your video tags is empty.`);
    } else {
        score.empty_tag = 1;
        $('.tag_empty').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Yay! Your video contains tags.`);
    }
    updateScore()
}

function tags_seo_words(input) {
    var text = $(input).val();

    if (text !== "") {
        if(charCount(text) > 0 && charCount(text) < 250) {
            score.tag_count = 0;
            $('.tags_characters').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your tags should be at least 250 characters.`);
        } else {
            score.tag_count = 8;
            $('.tags_characters').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! Your video tags have more than 250 characters.`);
        }
        updateScore()
    } else {
        score.tag_count = 0;
        $('.tags_characters').html(``);
    }
    updateScore()
}

function title_seo_contains(text,str) {
    if (str !== "" && text !== "") {
        if(textContains(text,str)) {
            score.k_title = 12;
            $('.keyword_in_title').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Great! Your focus keyword is in the title.`);
        } else {
            score.k_title = 0;
            $('.keyword_in_title').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your focus keyword is not in the title.`);
        }
        updateScore()
    } else {
        score.k_title = 0;
        $('.keyword_in_title').html(``);
    }
    updateScore()
}

function tags_seo_contains(text, str) {
    if (str !== "" && text !== "") {
        if(textContains(text,str)) {
            score.k_tag = 12;
            $('.keyword_tags').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Great! Your tags contains focus keyword.`);
        } else {
            score.k_tag = 0;
            $('.keyword_tags').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your tags dont have your focus keyword.`);
        }
        updateScore()
    } else {
        score.k_tag = 0;
        $('.keyword_tags').html(``);
    }
    updateScore()
}

function seo_tag_start_keyword(text, str) {
    if (str !== "" && text !== "") {
        if(startWith(text,str)) {
            score.st_tag = 8;
            $('.keyword_first_tag').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! You set your focus keyword as your first tag.`);
        } else {
            score.st_tag = 0;
            $('.keyword_first_tag').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your first tag should be your focus keyword.`);
        }
    } else {
        score.st_tag = 0;
        $('.keyword_first_tag').html(``);
    }
    updateScore()
}

function seo_description_start_keyword(text, str) {
    if (str !== "" && text !== "") {
        var paragraphs = text.split("\n");
        if(textContains(paragraphs[0],str)) {
            score.k_para = 12;
            $('.keyword_first_paragraph').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! Your focus keyword is in the paragraph of the description.`);
        } else {
            score.k_para = 0;
            $('.keyword_first_paragraph').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Your focus keyword isn't in the first paragraph of the description.`);
        }
    } else {
        score.k_para = 0;
        $('.keyword_first_paragraph').html(``);
    }
    updateScore()
}

function seo_description_one_time_keyword(text, str) {
    if (str !== "" && text !== "") {
        if(twiceKeyword(text,str) > 1) {
            score.desc_k_time = 8;
            $('.description_twice').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! Your description contains your focus keyword more than one time.`);
        } else {
            score.desc_k_time = 0;
            $('.description_twice').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! You must include your focus keyword 2-4 times in the description.`);
        }
    } else {
        score.desc_k_time = 0;
        $('.description_twice').html(``);
    }
    updateScore()
}

function seo_title_start_keyword(text, str) {
    if (str !== "" && text !== "") {
        if(startWith(text,str)) {
            score.st_title = 8;
            $('.keyword_start_title').html(`<i class="feather icon-check bg-success btn-circle text-white"></i> Well done! Your title start by your focus keyword.`);
        } else {
            score.st_title = 0;
            $('.keyword_start_title').html(`<i class="feather icon-x bg-warning btn-circle text-white"></i> Bad! Focus keyword should be placed at the start of your video title.`);
        }
    } else {
        score.st_title = 0;
        $('.keyword_start_title').html(``);
    }
    updateScore()
}
