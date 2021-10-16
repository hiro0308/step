@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
  @include('header')
  
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <div class="p-terms">
          	<h1 class="p-terms__heading">利用規約</h1>
						<ul class="p-terms__list">
							<li class="p-terms__item">
								<h2 class="p-terms__subHeading">第1条　総則</h2>
								<ol class="p-terms__content">
									<li class="p-terms__txt">
										本利用規約は、株式会社step（以下「当社」といいます。）が提供するサービス「step」（以下「本サイト」といいます。）の利用者が遵守すべき事項及び利用者と当社との関係を定めるものです。
									</li>
									<li class="p-terms__txt">
										本サービスの利用者は、本利用規約の内容を十分理解した上でその内容を遵守することに同意して本サービスを利用するものとし、本サービスを利用した場合には、当該利用者は本利用規約を遵守することに同意したものとみなします。
									</li>
								</ol>
							</li>
							<li class="p-terms__item">
								<h2 class="p-terms__subHeading">第2条　定義</h2>
								<p class="p-terms__description">
									本利用規約の中で使用される以下の各用語は、それぞれ以下の意味を有するものとします。
								</p>
								<ol class="p-terms__content">
									<li class="p-terms__txt">
										「本サービス」：本サイトの閲覧や本サイトに付随するメール配信等を利用した業務委託に関する情報提供サービスの総称のことをいいます。
									</li>
									<li class="p-terms__txt">
										「会員」：本サイトで所定の会員登録手続を行って当社から登録の承諾を受けた個人又は法人をさします。
									</li>
									<li class="p-terms__txt">
										「利用者」：会員又は非会員を問わず本サービスの提供を受ける個人又は法人で、本サイトの閲覧者も含みます。
									</li>
									<li class="p-terms__txt">
										「利用企業」:当社に対して案件と人材のマッチングを委託した企業をいいます。
									</li>
									<li class="p-terms__txt">
										「本取引」：本サービスを利用して行われる当社と会員の間での業務委託契約をいいます。
									</li>
									<li class="p-terms__txt">
										「登録情報」：会員登録手続で入力・提供された一切の情報をいいます。
									</li>
								</ol>
							</li>
							
							<li class="p-terms__item">
								<h2 class="p-terms__subHeading">第3条　規約の改定</h2>
								<p class="p-terms__description">
									本利用規約は、当社の判断により事前の予告なく変更・追加・削除されることがあります。利用者は、本利用規約変更後に本サイト・本サービスを利用した場合には、変更された本利用規約の内容に同意したものとみなされます。
								</p>
							</li>
							
							<li class="p-terms__item">
								<h2 class="p-terms__subHeading">第4条　定義</h2>
								<p class="p-terms__description">
									本利用規約の中で使用される以下の各用語は、それぞれ以下の意味を有するものとします。
								</p>
								<ol class="p-terms__content">
									<li class="p-terms__txt">
										会員登録手続を行うことができるのは、その会員となる本人（法人の場合には対外的な契約権限を有する者）に限るものとし、代理人による会員登録は認められないものとします。
									</li>
									<li class="p-terms__txt">
										会員登録手続を行う者は、登録情報の入力にあたり、入力した情報は全て真実であることを保証するものとします。
									</li>
									<li class="p-terms__txt">
										「登録した情報全てにつき、その内容の正確性・真実性・最新性等一切について、会員自らが責任を負うものとします。
									</li>
									<li class="p-terms__txt">
										会員として登録できる者の資格・条件は以下の通りです。但し、法人の場合には第１号及び第２号は適用されません。<br>満18歳以上であること。<br>未成年である場合には法定代理人の包括的な同意を得ていること。<br>電子メールアドレスを保有していること。<br>既に本サービスの会員となっていないこと。<br>本利用規約の全ての条項に同意すること。<br>過去、現在又は将来にわたって、暴力団等の反社会的勢力に所属せず、これらのものと関係を有しないこと。<br>
									</li>
									<li class="p-terms__txt">
										登録情報及び本サービスの利用において当社が知り得た利用者の情報については、別途定める「個人情報保護方針」に従って取り扱われるものとし、利用者はこれに同意するものとします。
								</ol>
								<p class="p-terms__revision">令和3年7月1日改訂</p>
							</li>
						</ul>
          </div>
        </div>
      </section>
    </div>
  </div>
  
  @include('footer')
@endsection
