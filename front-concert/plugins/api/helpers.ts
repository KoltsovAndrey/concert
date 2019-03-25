import axios from 'axios'

export interface IQuery<TForm, TResult> {
  readonly method: String,
  readonly url: String,
  execute(form: TForm): Promise<TResult>
}

interface IQueryError {

}

interface IQueryResult<TResult> {
  readonly status: Boolean
  readonly data: TResult | IQueryError
}

class Query<TForm, TResult> implements IQuery<TForm, TResult> {
  readonly method: String
  readonly url: String

  constructor(method: String, url: String) {
    this.method = method
    this.url = url
  }

  execute(form: TForm): Promise<TResult> {
    // return axios({method, url, })
  }
}

export interface IPaginateResult<TItem> {
  meta: PaginateMeta
  items: Array<TItem>
}

export interface IPaginateMeta {
  readonly per_page: Number
  readonly current_page: Number
  readonly last_page: Number
  readonly total: Number
}

export class PaginateMeta {
  public readonly per_page: Number
  public readonly current_page: Number
  public readonly last_page: Number
  public readonly total: Number

  constructor(meta: IPaginateMeta) {
    this.per_page = meta.per_page
    this.current_page = meta.current_page
    this.last_page = meta.last_page
    this.total = meta.total
  }

  public isEmpty() {
    return this.total <= 0
  }

  public static readonly empty: PaginateMeta = new PaginateMeta({
    per_page: 0,
    current_page: 0,
    last_page: 0,
    total: 0
  })
}

export class LazyPaginator<TForm, TItem> {
  private _query: IQuery<TForm, IPaginateResult<TItem>>
  private _items: ReadonlyArray<TItem>
  private _meta: PaginateMeta

  public get query(): IQuery<TForm, IPaginateResult<TItem>> {
    return this._query
  }

  public get items(): ReadonlyArray<TItem> {
    return this._items
  }

  public get meta(): PaginateMeta {
    return this._meta
  }

  constructor(query: IQuery<TForm, IPaginateResult<TItem>>) {
    this._query = query
    this._items = new Array()
    this._meta = PaginateMeta.empty
  }

  public async next(form: TForm): Promise<Boolean> {
    const result = await this._query.execute(form)

    this._items = this._items.concat(result.items)
    this._meta = result.meta

    return true
  }
}