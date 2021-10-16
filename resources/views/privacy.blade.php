@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
  @include('header')
  
  <div class="l-main">
    <div class="u-bgColor--baseColor">
      <section class="l-container l-content">
        <div class="c-box c-box--m c-box--border">
          <div class="p-terms">
          	<h1 class="p-terms__heading">個人情報保護方針</h1>
						<ul class="p-terms__list">
							<li class="p-terms__item">
								<p class="p-terms__description">
									株式会社step（以下「当社」といいます。）は、当社が取り扱う全ての個人情報の保護について、本人の権利の保護、個人情報に関する法規制等を遵守します。また、以下に示す方針を具現化するための個人情報保護マネジメントシステムを構築し、最新のＩＴ技術の動向、社会的要請の変化、経営環境の変動等を常に認識しながら、その継続的改善に、全社を挙げて取り組むことをここに宣言します。
								</p>
								<ol class="p-terms__content">
									<li class="p-terms__txt">
										個人情報は、当社の正当な事業遂行上並びに従業員の雇用、人事管理上必要な範囲に限定して、取得・利用及び提供をし、特定された利用目的の達成に必要な範囲を超えた個人情報の取扱い（目的外利用）を行いません。また、目的外利用を行わないための措置を講じます。
									</li>
									<li class="p-terms__txt">
										個人情報保護に関する法令、国が定める指針及びその他の規範を遵守致します。
									</li>
									<li class="p-terms__txt">
										個人情報の漏えい、滅失、き損などのリスクに対しては、合理的な安全対策を講じて防止すべく事業の実情に合致した経営資源を注入し個人情報セキュリティ体制を継続的に向上させます。また、万一の際には速やかに是正措置を講じます。
									</li>
									<li class="p-terms__txt">
										個人情報取扱いに関する苦情及び相談に対しては、迅速かつ誠実に、適切な対応をさせていただきます。
									</li>
									<li class="p-terms__txt">
										個人情報保護マネジメントシステムは、当社を取り巻く環境の変化を踏まえ、適時・適切に見直してその改善を継続的に推進します。
									</li>
								</ol>
							</li>
						</ul>
						<div class="p-terms__privacy">
							<p class="p-terms__privacy__text">
								プライバシーポリシーに関するお問い合わせについて
							</p>
							<div class="p-terms__privacy__block">
								<p class="p-terms__privacy__block__text">【個人情報に関するお問い合わせ窓口】</p>
								<p class="p-terms__privacy__block__text">〒000-0000</p>
								<p class="p-terms__privacy__block__text">東京都渋谷区恵比寿0丁目00番0号</p>
								<p class="p-terms__privacy__block__text">株式会社step 個人情報担当</p>
							</div>
						</div>
          </div>
        </div>
      </section>
    </div>
  </div>
  
  @include('footer')
@endsection
